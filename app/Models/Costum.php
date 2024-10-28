<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Costum extends Model
{
    use HasFactory, Sluggable;
    protected $table = 'costums';
    protected $fillable = [
        'id',
        'costum_code',
        'warna',
        'image',
        'slug',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
            'source' => 'warna'
            ]
        ];
    }
}
