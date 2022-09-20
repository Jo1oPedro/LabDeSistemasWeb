<?php

if(count($argv) == 2) {
    $migration_name = $argv[1];
    $migration_path = __DIR__."\..\database\migrations\\" . $migration_name . "_table.php";
    if(!file_exists($migration_path) || !is_file($migration_path)) {
        $file = __DIR__."\..\database\default_migration\DefaultMigration.php";
        // echo $file;
        $default_migration = file_get_contents($file);
        $customized_migration = str_replace(
            [
                "table_name",
                "tableName",
            ],
            [
                $migration_name."table",
                $migration_name,
            ],
            $default_migration
        );
        $fileOpen = fopen($migration_path, "w");
        file_put_contents($migration_path, $customized_migration);

        //$rename
    } else {
        echo "A migration já $migration_name já foi criada";
    }

}