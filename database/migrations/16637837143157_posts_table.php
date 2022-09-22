<?php

namespace Database\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class poststable
{
    public static function up()
    {
        Capsule::schema()->create("posts", function (Blueprint $table) {
            $table->increments("id");
            $table->string("body");
            $table->foreignId("user_id")->constrained()->onDelete('cascade');
            $table->string('image_path')->default(__DIR__."\..\..\public\img\defaultImage.png");
            $table->timestamps();
        });
    }

    public static function down() {
        Capsule::schema()->drop("posts");
    }
}