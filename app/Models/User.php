<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User Extends Model
{

    protected $fillable = [
        "name",
        "email",
        "password",
        "sexo",
        "data_nascimento",
    ];

}