<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    use Sluggable;
    protected $table = "menuses";

    protected $fillable = [
        'name',
        'slug',
        'image',
        'status'
    ];

    public function products()
    {
        return $this->hasMany(Products::class, 'MainCat', 'id');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
