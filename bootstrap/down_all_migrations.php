<?php

namespace bootstrap;

require "start_application.php";

//Para resetar as migrations basta rodar php bootstrap/down_all_migrations.php 

$migrations_to_run = array_diff((scandir("database/migrations")) ?? [], ['.', '..']);

if(count($migrations_to_run)) {
    foreach($migrations_to_run as $key => $migration) {
        $migrations_to_run[$key] = "Database\Migrations\\" . str_replace("_", "", $migration);
        $migrations_to_run[$key] = str_replace(".php", "", $migrations_to_run[$key]);
        try {
            echo "Migration resetada $migration" . PHP_EOL;
            $migrations_to_run[$key]::down();
        } catch(\Exception $exception) {
            echo "As migrations já foram resetadas";
            //$migrations_to_run[$key]::down();
        }
    }
} else {
    echo "Não há migrations a serem resetadas";
}