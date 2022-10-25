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
        Schema::create('dynamic_marks', function (Blueprint $table) {
            
            $table->id();
            $table->String('studentId');
            $table->String('subjectId');
            $table->String('term');
            $table->String('teacherId');
            $table->String('gaurdianId');
            $table->String('marks');
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
        Schema::dropIfExists('dynamic_marks');
    }
};
