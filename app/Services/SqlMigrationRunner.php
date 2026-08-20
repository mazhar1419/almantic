<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use RuntimeException;

class SqlMigrationRunner
{
    private string $path;

    public function __construct()
    {
        $this->path = database_path('sql');
    }

    /**
     * Run all SQL files in database/sql in filename order.
     *
     * Rules:
     * 1. The migration registry is created first.
     * 2. If a migration was already recorded, it is skipped.
     * 3. If the migration's target table already exists, the SQL is skipped
     *    and the migration is recorded as applied.
     * 4. SQL files use CREATE TABLE IF NOT EXISTS as a second safety layer.
     *
     * This runner is intentionally simple for cPanel/shared hosting.
     */
    public function run(): array
    {
        $this->ensureMigrationTable();

        $files = glob($this->path . DIRECTORY_SEPARATOR . '*.sql') ?: [];
        sort($files, SORT_STRING);

        $results = [];

        foreach ($files as $file) {
            $migration = basename($file);

            if ($migration === '000_create_migrations.sql') {
                $this->recordIfMissing($migration, 1);

                $results[] = [
                    'migration' => $migration,
                    'status' => 'ready',
                    'message' => 'Migration registry is available.',
                ];

                continue;
            }

            if ($this->isRecorded($migration)) {
                $results[] = [
                    'migration' => $migration,
                    'status' => 'skipped',
                    'message' => 'Already recorded as applied.',
                ];

                continue;
            }

            $table = $this->extractCreateTableName(
                file_get_contents($file) ?: ''
            );

            if ($table !== null && $this->tableExists($table)) {
                $this->recordIfMissing($migration, 1);

                $results[] = [
                    'migration' => $migration,
                    'status' => 'skipped',
                    'message' => "Table '{$table}' already exists.",
                ];

                continue;
            }

            $sql = trim((string) file_get_contents($file));

            if ($sql === '') {
                throw new RuntimeException("Migration '{$migration}' is empty.");
            }

            DB::unprepared($sql);

            $this->recordIfMissing($migration, 1);

            $results[] = [
                'migration' => $migration,
                'status' => 'applied',
                'message' => 'SQL executed successfully.',
            ];
        }

        return $results;
    }

    private function ensureMigrationTable(): void
    {
        DB::unprepared($this->sqlFile('000_create_migrations.sql'));
    }

    private function sqlFile(string $file): string
    {
        $path = $this->path . DIRECTORY_SEPARATOR . $file;

        if (!is_file($path)) {
            throw new RuntimeException("Migration file not found: {$file}");
        }

        return (string) file_get_contents($path);
    }

    private function isRecorded(string $migration): bool
    {
        return DB::table('almantic_migrations')
            ->where('migration', $migration)
            ->exists();
    }

    private function recordIfMissing(string $migration, int $batch): void
    {
        if ($this->isRecorded($migration)) {
            return;
        }

        DB::table('almantic_migrations')->insert([
            'migration' => $migration,
            'batch' => $batch,
            'applied_at' => now(),
        ]);
    }

    private function tableExists(string $table): bool
    {
        $database = DB::connection()->getDatabaseName();

        $result = DB::selectOne(
            'SELECT COUNT(*) AS count
             FROM information_schema.tables
             WHERE table_schema = ?
             AND table_name = ?',
            [$database, $table]
        );

        return ((int) ($result->count ?? 0)) > 0;
    }

    private function extractCreateTableName(string $sql): ?string
    {
        $pattern = '/CREATE\s+TABLE\s+IF\s+NOT\s+EXISTS\s+[`"]?([A-Za-z0-9_]+)[`"]?/i';

        if (!preg_match($pattern, $sql, $matches)) {
            return null;
        }

        return $matches[1];
    }
}
