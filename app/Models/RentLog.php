<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RentLog extends Model
{
    use HasFactory;
    protected $table = 'rent_logs';
    protected $fillable = [
        'user_id',
        'costum_id',
        'rent_date',
        'return_date',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function costum() : BelongsTo
    {
        return $this->belongsTo(Costum::class, 'costum_id', 'id');
    }
}
