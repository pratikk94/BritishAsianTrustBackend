<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    use HasFactory;
    protected $fillable = [
        'studentId',
        'gaurdianId',
        'teacherId',
        'term',
        'english',
        'maths',
        'science',
        'socialScience',
        'computer'
    ];
}
