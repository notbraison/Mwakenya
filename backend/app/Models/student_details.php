<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_details extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'grade',
        'school',
        'weakSubjects'
    ];
}
