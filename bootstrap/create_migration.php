<?php

// rodar comando app/bootstrap/create_migration.php nome_da_migration --m para criar com a model junto

if(count($argv) == 2 || count($argv) == 3) {
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

        if(key_exists(2, $argv)) {
            $model_name = ucfirst(substr($migration_name, 0 , -1));
            $model_path = __DIR__."\..\app\Models\\$model_name.php";
            if(!file_exists($model_path) || !is_file($model_path)) {
                $file = __DIR__."\..\app\Models\default_model\DefaultModel.php";
                $default_model = file_get_contents($file);
                $customized_model = str_replace(
                    "table_name_uc_first",
                    $model_name,
                    $default_model
                );
                $fileOpen = fopen($model_path, "w");
                file_put_contents($model_path, $customized_model);
            } else {
                echo "A model $model_name já existe";
            }
        }
    } else {
        echo "A migration já $migration_name já foi criada";
    }

}