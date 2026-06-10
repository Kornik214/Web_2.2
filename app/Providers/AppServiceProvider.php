<?php

namespace App\Providers;

use Illuminate\Database\SQLiteConnection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use PDO;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        DB::extend('sqlite', function (array $config, string $name) {
            $database = str_replace('\\', '/', $config['database']);

            $pdo = new PDO("sqlite:{$database}", null, null, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
            $pdo->exec('PRAGMA journal_mode = MEMORY');

            $connection = new SQLiteConnection(
                $pdo,
                $config['database'],
                $config['prefix'] ?? '',
                $config
            );

            $connection->setEventDispatcher($this->app['events']);

            return $connection;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        DB::purge('sqlite');
    }
}
