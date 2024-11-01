<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Costum;

class Category extends Model
{
    use HasFactory, Sluggable;
    protected $fillable = [
        'id',
        'name',
        'slug',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
            'source' => 'name'
            ]
        ];
    }

    public function costums()
    {
        return $this->hasMany(Costum::class);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
