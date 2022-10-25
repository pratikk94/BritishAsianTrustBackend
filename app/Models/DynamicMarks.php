<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicMarks extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'studentId',
        'subjectId',
        'term',
        'teacherId',
        'gaurdianId',
        'marks'
    ];

    protected $with = [
        'student',
        'teacher',
        'gaurdian',
        'subject'
    ];

    public function student(){
        return $this->belongsTo(Student::class,'studentId');
    }
    
    public function subject(){
        return $this->belongsTo(Subject::class,'subjectId');
    }
    
    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacherId');
    }
    
    public function gaurdian(){
        return $this->belongsTo(Gaurdian::class,'gaurdianId');
    }
    



}
