<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            
            $table->id();
            $table->string('studentId');
            $table->string('gaurdianId');
            $table->string('teacherId');
            $table->string('term');
            $table->string('english');
            $table->string('maths');
            $table->string('science');
            $table->string('socialScience');
            $table->string('computer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marks');
    }
};
