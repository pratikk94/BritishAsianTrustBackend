<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone_no',
        'date_of_birth',
        'standard',
        'division',
        'gaurdian_id',
        'teacher_id'
    ];


    public function marks(){

        return $this->hasMany(Marks::class,'studentId');

    }

    public function teacher(){

        return $this->belongsTo(Teacher::class,'teacher_id');

    }

    public function gaurdian(){

        return $this->belongsTo(Gaurdian::class,'gaurdian_id');

    }

    


}
