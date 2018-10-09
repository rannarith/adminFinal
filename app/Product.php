<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'ProductID';
    protected $fillable = [
        'ProductName', 'Pro_Description	',
    ];

    public function user() {
        $this -> belongsTo(\App\User::class);
    }

    public function category() {
        $this -> belongsTo(\App\Category::class);
    }
}
