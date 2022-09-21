<?php

namespace bootstrap;

require "start_application.php";

//Para executar basta digitar php bootstrap/run_all_migrations.php 

$migrations_to_run = array_diff((scandir("database/migrations")) ?? [], ['.', '..']);

if(count($migrations_to_run)) {
    foreach($migrations_to_run as $key => $migration) {
        $migrations_to_run[$key] = "Database\Migrations\\" . str_replace("_", "", $migration);
        $migrations_to_run[$key] = str_replace(".php", "", $migrations_to_run[$key]);
        try {
            echo "Migration rodada: $migration" . PHP_EOL;
            $migrations_to_run[$key]::up();
        } catch(\Exception $exception) {
            echo "As migrations já foram rodadas" . PHP_EOL;
            //$migrations_to_run[$key]::down();
        }
    }
} else {
    echo "Não há migrations a serem rodadas";
}

/*
var_dump($migrations_to_run);
$array2 = "Database\Migrations\userstable";
//use Database\Migrations\userstable;
die();
$user = new $array2();
$user->up();
*/