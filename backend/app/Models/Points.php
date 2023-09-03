<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Points extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'points'
    ];
    
    public function users(): BelongsTo
    {
        return $this->belongsTo(Users::class);
    }

   
}
