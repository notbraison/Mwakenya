<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Grade extends Model
{
    use HasFactory;
    protected $table = 'grade'; // Specify the actual table name

    protected $fillable =[
        'grade'
    ];
    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class);
    }

}
