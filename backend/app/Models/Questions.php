<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Questions extends Model
{
    use HasFactory;
    protected $fillable = [
        'questionText',
        'grade',
        'subject',
        'topic'
    ];
    public function answer(): HasOne
    {
        return $this->hasOne(Answer::class);
    }

}
