<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Category;
use App\Models\Costum;

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
        'category_id',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
            'source' => 'warna'
            ]
        ];
    }
    public function item()
    {
        return $this->belongsTo(Category::class);
    }
    public function costum() {
        return $this->hasMany(Costum::class);
    }

}
