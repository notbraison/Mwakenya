<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $fillable = [
        'topic_name',
        'subject_name',
        'grade'
        ];
        
        public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
