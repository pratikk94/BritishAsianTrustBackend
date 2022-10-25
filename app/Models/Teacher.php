<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'username',
        'name',
        'email',
        'phoneNumber',
        'dateOfJoining'
    ];

    public function marks(){

        return $this->hasMany(Marks::class,'teacherId');

    }


    public function students(){

        return $this->hasMany(Student::class,'teacher_id');

    }



}
