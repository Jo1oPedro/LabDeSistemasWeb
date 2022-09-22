<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post Extends Model
{

    protected $fillable = [
        'body',
        'user_id',
        'image_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "id");
    }

}