<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the database if it does not exist';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $database = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');

        // Conectar a PostgreSQL sin especificar una base de datos
        $connection = pg_connect("host=127.0.0.1 dbname=postgres user=$username password=$password");

        if (!$connection) {
            $this->error('Could not connect to PostgreSQL.');
            return;
        }

        // Verificar si la base de datos ya existe
        $result = pg_query($connection, "SELECT 1 FROM pg_database WHERE datname = '$database'");
        if (pg_num_rows($result) == 0) {
            // Crear la base de datos
            pg_query($connection, "CREATE DATABASE $database");
            $this->info("Database '$database' created successfully.");
        } else {
            $this->info("Database '$database' already exists.");
        }

        pg_close($connection);
    }
}
