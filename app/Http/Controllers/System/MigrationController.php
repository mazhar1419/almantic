<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class MigrationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Migration Page
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        return view('system.migrate');
    }


    /*
    |--------------------------------------------------------------------------
    | Migration Result Page
    |--------------------------------------------------------------------------
    */

    public function result(Request $request)
    {
        $result = $request->session()->get(
            'migration_result'
        );

        if (!$result) {
            return redirect()->route(
                'system.migrate.page'
            );
        }

        return view(
            'system.migrate-result',
            compact('result')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Run Migration
    |--------------------------------------------------------------------------
    */

    public function run(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Migration Key
        |--------------------------------------------------------------------------
        */

        $providedKey = (string) $request->input(
            'migration_key'
        );

        $configuredKey = (string) config(
            'app.migration_key',
            ''
        );


        /*
        |--------------------------------------------------------------------------
        | Validate Key
        |--------------------------------------------------------------------------
        */

        if (
            $configuredKey === '' ||
            $providedKey === '' ||
            !hash_equals(
                $configuredKey,
                $providedKey
            )
        ) {

            return redirect()
                ->route('system.migrate.result')
                ->with('migration_result', [
                    'success' => false,

                    'title' =>
                        'Migration Access Denied',

                    'message' =>
                        'The migration key is invalid.',

                    'results' => [],
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Migration Directory
        |--------------------------------------------------------------------------
        */

        $migrationPath = database_path('sql');


        if (!is_dir($migrationPath)) {

            return redirect()
                ->route('system.migrate.result')
                ->with('migration_result', [
                    'success' => false,

                    'title' =>
                        'Migration Failed',

                    'message' =>
                        'Migration directory does not exist.',

                    'results' => [],
                ]);
        }


        try {

            /*
            |--------------------------------------------------------------------------
            | Migration Registry
            |--------------------------------------------------------------------------
            */

            DB::unprepared("
                CREATE TABLE IF NOT EXISTS almantic_migrations (

                    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,

                    migration VARCHAR(190) NOT NULL,

                    batch INT UNSIGNED NOT NULL,

                    applied_at DATETIME NOT NULL
                        DEFAULT CURRENT_TIMESTAMP,

                    PRIMARY KEY (id),

                    UNIQUE KEY
                        uq_almantic_migrations_migration
                        (migration),

                    KEY
                        idx_almantic_migrations_batch
                        (batch)

                )
                ENGINE=InnoDB
                DEFAULT CHARSET=utf8mb4
                COLLATE=utf8mb4_unicode_ci
            ");


            /*
            |--------------------------------------------------------------------------
            | SQL Files
            |--------------------------------------------------------------------------
            */

            $files = glob(
                $migrationPath
                . DIRECTORY_SEPARATOR
                . '*.sql'
            ) ?: [];


            sort(
                $files,
                SORT_STRING
            );


            /*
            |--------------------------------------------------------------------------
            | Batch
            |--------------------------------------------------------------------------
            */

            $lastBatch = DB::table(
                'almantic_migrations'
            )->max('batch');

            $batch = ((int) $lastBatch) + 1;


            /*
            |--------------------------------------------------------------------------
            | Results
            |--------------------------------------------------------------------------
            */

            $results = [];

            $hasNewMigrations = false;


            /*
            |--------------------------------------------------------------------------
            | Process Migrations
            |--------------------------------------------------------------------------
            */

            foreach ($files as $file) {

                $migration = basename($file);


                /*
                |--------------------------------------------------------------------------
                | Migration Registry File
                |--------------------------------------------------------------------------
                */

                if (
                    $migration ===
                    '000_create_migrations.sql'
                ) {

                    $results[] = [
                        'migration' =>
                            $migration,

                        'status' =>
                            'ready',

                        'message' =>
                            'Migration registry is available.',
                    ];

                    continue;
                }


                /*
                |--------------------------------------------------------------------------
                | Already Applied
                |--------------------------------------------------------------------------
                */

                $alreadyApplied = DB::table(
                    'almantic_migrations'
                )
                    ->where(
                        'migration',
                        $migration
                    )
                    ->exists();


                if ($alreadyApplied) {

                    $results[] = [
                        'migration' =>
                            $migration,

                        'status' =>
                            'skipped',

                        'message' =>
                            'Migration already applied.',
                    ];

                    continue;
                }


                /*
                |--------------------------------------------------------------------------
                | Read SQL
                |--------------------------------------------------------------------------
                */

                $sql = trim(
                    (string) file_get_contents($file)
                );


                if ($sql === '') {

                    $results[] = [
                        'migration' =>
                            $migration,

                        'status' =>
                            'skipped',

                        'message' =>
                            'Migration file is empty.',
                    ];

                    continue;
                }


                /*
                |--------------------------------------------------------------------------
                | Detect Table
                |--------------------------------------------------------------------------
                */

                $tableName = null;

                $pattern =
                    '/CREATE\s+TABLE\s+'
                    . 'IF\s+NOT\s+EXISTS\s+'
                    . '[`"]?([A-Za-z0-9_]+)[`"]?/i';


                if (
                    preg_match(
                        $pattern,
                        $sql,
                        $matches
                    )
                ) {

                    $tableName =
                        $matches[1];
                }


                /*
                |--------------------------------------------------------------------------
                | Existing Table
                |--------------------------------------------------------------------------
                */

                if ($tableName !== null) {

                    $database = DB::connection()
                        ->getDatabaseName();


                    $tableExists = DB::selectOne(
                        "
                        SELECT COUNT(*) AS count

                        FROM information_schema.tables

                        WHERE table_schema = ?

                        AND table_name = ?
                        ",
                        [
                            $database,
                            $tableName
                        ]
                    );


                    if (
                        (int) (
                            $tableExists->count ?? 0
                        ) > 0
                    ) {

                        DB::table(
                            'almantic_migrations'
                        )->insert([
                            'migration' =>
                                $migration,

                            'batch' =>
                                $batch,

                            'applied_at' =>
                                now(),
                        ]);


                        $results[] = [
                            'migration' =>
                                $migration,

                            'status' =>
                                'skipped',

                            'message' =>
                                "Table '{$tableName}' "
                                . "already exists.",
                        ];


                        $hasNewMigrations = true;

                        continue;
                    }
                }


                /*
                |--------------------------------------------------------------------------
                | Execute SQL
                |--------------------------------------------------------------------------
                */

                DB::unprepared($sql);


                /*
                |--------------------------------------------------------------------------
                | Record Migration
                |--------------------------------------------------------------------------
                */

                DB::table(
                    'almantic_migrations'
                )->insert([
                    'migration' =>
                        $migration,

                    'batch' =>
                        $batch,

                    'applied_at' =>
                        now(),
                ]);


                $results[] = [
                    'migration' =>
                        $migration,

                    'status' =>
                        'applied',

                    'message' =>
                        'Migration applied successfully.',
                ];


                $hasNewMigrations = true;
            }


            /*
            |--------------------------------------------------------------------------
            | Save Result
            |--------------------------------------------------------------------------
            */

            $result = [
                'success' =>
                    true,

                'title' =>
                    'Migration Successful',

                'message' =>
                    'All pending migrations have been processed.',

                'batch' =>
                    $batch,

                'has_new_migrations' =>
                    $hasNewMigrations,

                'results' =>
                    $results,
            ];


            /*
            |--------------------------------------------------------------------------
            | Redirect Result Page
            |--------------------------------------------------------------------------
            */

            return redirect()
                ->route('system.migrate.result')
                ->with(
                    'migration_result',
                    $result
                );


        } catch (Throwable $e) {

            /*
            |--------------------------------------------------------------------------
            | Log Error
            |--------------------------------------------------------------------------
            */

            report($e);


            /*
            |--------------------------------------------------------------------------
            | Error Result
            |--------------------------------------------------------------------------
            */

            $result = [
                'success' =>
                    false,

                'title' =>
                    'Migration Failed',

                'message' =>
                    config('app.debug')
                        ? $e->getMessage()
                        : 'An error occurred while running the migration.',

                'batch' =>
                    $batch ?? null,

                'results' =>
                    $results ?? [],
            ];


            return redirect()
                ->route('system.migrate.result')
                ->with(
                    'migration_result',
                    $result
                );
        }
    }
}