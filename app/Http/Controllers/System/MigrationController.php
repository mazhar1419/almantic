<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class MigrationController extends Controller
{
    public function run(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Migration Security
        |--------------------------------------------------------------------------
        */

        $providedKey = (string) $request->header(
            'X-Almantic-Migration-Key'
        );

        if ($providedKey === '') {
            $providedKey = (string) $request->query('key');
        }

        $configuredKey = (string) config(
            'app.migration_key'
        );

        if (
            $configuredKey === '' ||
            !hash_equals($configuredKey, $providedKey)
        ) {
            abort(403, 'Migration access denied.');
        }


        /*
        |--------------------------------------------------------------------------
        | Migration Directory
        |--------------------------------------------------------------------------
        */

        $migrationPath = database_path('sql');


        /*
        |--------------------------------------------------------------------------
        | Create Migration Registry
        |--------------------------------------------------------------------------
        */

        try {

            DB::unprepared("
                CREATE TABLE IF NOT EXISTS almantic_migrations (
                    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                    migration VARCHAR(190) NOT NULL,
                    batch INT UNSIGNED NOT NULL,
                    applied_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

                    PRIMARY KEY (id),

                    UNIQUE KEY uq_almantic_migrations_migration
                        (migration),

                    KEY idx_almantic_migrations_batch
                        (batch)

                ) ENGINE=InnoDB
                DEFAULT CHARSET=utf8mb4
                COLLATE=utf8mb4_unicode_ci
            ");


            /*
            |--------------------------------------------------------------------------
            | Read SQL Files
            |--------------------------------------------------------------------------
            */

            $files = glob(
                $migrationPath . DIRECTORY_SEPARATOR . '*.sql'
            ) ?: [];


            /*
            |--------------------------------------------------------------------------
            | Sort Migration Files
            |--------------------------------------------------------------------------
            */

            sort($files, SORT_STRING);


            /*
            |--------------------------------------------------------------------------
            | Get Current Batch
            |--------------------------------------------------------------------------
            */

            $lastBatch = DB::table('almantic_migrations')
                ->max('batch');

            $batch = ((int) $lastBatch) + 1;


            /*
            |--------------------------------------------------------------------------
            | Results
            |--------------------------------------------------------------------------
            */

            $results = [];

            $hasNewMigration = false;


            /*
            |--------------------------------------------------------------------------
            | Run Migrations
            |--------------------------------------------------------------------------
            */

            foreach ($files as $file) {

                $migration = basename($file);


                /*
                |--------------------------------------------------------------------------
                | Skip Migration Registry SQL
                |--------------------------------------------------------------------------
                */

                if ($migration === '000_create_migrations.sql') {

                    $results[] = [
                        'migration' => $migration,
                        'status' => 'ready',
                        'message' => 'Migration registry is available.',
                    ];

                    continue;
                }


                /*
                |--------------------------------------------------------------------------
                | Already Recorded?
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
                        'migration' => $migration,
                        'status' => 'skipped',
                        'message' => 'Migration already applied.',
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
                        'migration' => $migration,
                        'status' => 'skipped',
                        'message' => 'Migration file is empty.',
                    ];

                    continue;
                }


                /*
                |--------------------------------------------------------------------------
                | Detect Target Table
                |--------------------------------------------------------------------------
                |
                | Example:
                |
                | CREATE TABLE IF NOT EXISTS users (...)
                |
                */

                $tableName = null;

                if (
                    preg_match(
                        '/CREATE\s+TABLE\s+IF\s+NOT\s+EXISTS\s+[`"]?([A-Za-z0-9_]+)[`"]?/i',
                        $sql,
                        $matches
                    )
                ) {
                    $tableName = $matches[1];
                }


                /*
                |--------------------------------------------------------------------------
                | If Table Already Exists
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
                        ((int) ($tableExists->count ?? 0)) > 0
                    ) {

                        DB::table(
                            'almantic_migrations'
                        )->insert([
                            'migration' => $migration,
                            'batch' => $batch,
                            'applied_at' => now(),
                        ]);


                        $results[] = [
                            'migration' => $migration,
                            'status' => 'skipped',
                            'message' =>
                                "Table '{$tableName}' already exists.",
                        ];


                        $hasNewMigration = true;

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
                    'migration' => $migration,
                    'batch' => $batch,
                    'applied_at' => now(),
                ]);


                $results[] = [
                    'migration' => $migration,
                    'status' => 'applied',
                    'message' => 'Migration applied successfully.',
                ];


                $hasNewMigration = true;
            }


            /*
            |--------------------------------------------------------------------------
            | Response
            |--------------------------------------------------------------------------
            */

            return response()->json([
                'success' => true,
                'batch' => $batch,
                'has_new_migrations' => $hasNewMigration,
                'results' => $results,
            ]);

        } catch (Throwable $e) {

            report($e);


            return response()->json([
                'success' => false,
                'message' => 'Migration failed.',
            ], 500);
        }
    }
}