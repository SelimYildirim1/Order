<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;


class Products extends Model
{

    use Sluggable;
    protected $table = "products";

    protected $fillable =  [
        'name',
        'slug',
        'description',
        'MainCat',
        'price',
        'image',
        'status'
    ];

    public function menus()
    {
        return $this->belongsTo(Menus::class, 'MainCat', 'id');
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
