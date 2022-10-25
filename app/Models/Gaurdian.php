<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaurdian extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'username',
        'name',
        'email',
        'phoneNumber'
    ];


    public function marks(){

        return $this->hasMany(Marks::class,'gaurdianId');

    }


    public function students(){

        return $this->hasMany(Student::class,'gaurdian_id');

    }



}

