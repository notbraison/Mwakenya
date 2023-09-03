<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grade_subjects extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_id',
        'grade_id'
    ];
    
}
