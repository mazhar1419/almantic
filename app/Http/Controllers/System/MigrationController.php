<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Services\SqlMigrationRunner;
use Illuminate\Http\Request;
use Throwable;

class MigrationController extends Controller
{
    public function run(Request $request, SqlMigrationRunner $runner)
    {
        $providedKey = (string) $request->header('X-Almantic-Migration-Key');

        if ($providedKey === '') {
            $providedKey = (string) $request->query('key');
        }

        $configuredKey = (string) config('app.migration_key');

        if (
            $configuredKey === '' ||
            !hash_equals($configuredKey, $providedKey)
        ) {
            abort(403, 'Migration access denied.');
        }

        try {
            $results = $runner->run();

            return response()->json([
                'success' => true,
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
