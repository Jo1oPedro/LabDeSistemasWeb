<?php

namespace Database\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class bannerstable
{
    public static function up()
    {
        Capsule::schema()->create("banners", function (Blueprint $table) {
            $table->increments("id");
            $table->string("image_path")->default("public/img/banners/default_banner.jpg");
            $table->string("title")->default("Propaganda");
            $table->timestamps();
        });
    }

    public static function down() {
        Capsule::schema()->drop("banners");
    }
}