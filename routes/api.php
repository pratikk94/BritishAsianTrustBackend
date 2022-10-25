<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DynamicMarksController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GaurdianController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Http\Controllers\MarksController;
use App\Http\Controllers\SubjectController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register',[AuthController::class,'register']);
    // Login request pending.
    Route::post('/login',[AuthController::class,'login']);
    Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('/get_all_student', [StudentController::class,'index']);
    Route::get('/get_student_info/{student}',[StudentController::class,'show']);
    Route::post('/set_student_info',[StudentController::class,'store']);
    Route::post('/update_student_info/{id}',[StudentController::class,'update']);
    Route::get('/get_all_teacher',[TeacherController::class,'index']);
    Route::get('/get_teacher_info/{id}',[TeacherController::class,'show']);
    Route::post('/set_teacher_info',[TeacherController::class,'store']);
    Route::post('/update_teacher_info/{id}',[TeacherController::class,'update']);
    Route::get('/get_all_gaurdian',[GaurdianController::class,'index']);
    Route::get('/get_gaurdian_info/{id}',[GaurdianController::class,'show']);
    Route::post('/set_gaurdian_info',[GaurdianController::class,'store']);
    Route::post('/update_gaurdian_info/{id}',[GaurdianController::class,'update']);
    Route::get('/get_principal_info/{id}',[PrincipalController::class,'show']); 
    Route::post('/set_principal_info',[PrincipalController::class,'store']);
    // These will go away.
    Route::get('/get_all_student_marks',[MarksController::class,'index']);
    Route::get('/get_all_student_marks_gaurdian/{gaurdian}/{termId}',[GaurdianController::class,'getAllStudentMarks']);
    Route::get('/get_all_student_marks/{teacher}/{termId}',[TeacherController::class,'getAllStudentMarks']);
    Route::get('/get_student_mark_info/{student}/{termId}',[MarksController::class,'show']);
    Route::post('/set_student_mark_info',[MarksController::class,'store']);
    Route::post('/update_student_mark_info/{id}',[MarksController::class,'update']);
    Route::post('/set_subject',[SubjectController::class,'store']);
    
    // Add marks to student.
    Route::post('/assign_student_marks',[DynamicMarksController::class,'store']);
    // DONE
    Route::post('/get_marks_for_term',[DynamicMarksController::class,'getMarksByTerm']);
    // get marks for a term for a particular student API
    Route::post('/get_marks_for_student',[DynamicMarksController::class,'getMarksOfStudent']);
    // get marks for a term for students for a given gaurdian API
    Route::post('/get_marks_for_term_and_gaurdian',[DynamicMarksController::class,'getMarksByTermGaurdian']);
    // get marks for a term for students for a given teacher API (?) 
    Route::post('/get_marks_for_term_and_teacher',[DynamicMarksController::class,'getMarksByTermTeacher']);
    // get marks for a term for all students API
    Route::post('/get_marks_for_term_students',[DynamicMarksController::class,'getMarksForTermStudents']);
    // get range of marks of all students for a particular subject term wise API
    Route::post('/get_marks_for_students_and_subject_term',[DynamicMarksController::class,'getMarksBySubjectTerm']);
    // get range of marks of all students for a particular subject for a given gaurdian term wise API
    Route::post('/get_marks_for_students_and_gaurdian_term',[DynamicMarksController::class,'getMarksByGaurdianTerm']);
    // get range of marks of all students for a particular subject for a given teacher term wise API.
    Route::post('/get_marks_for_students_and_teacher_term',[DynamicMarksController::class,'getMarksByTeacherTerm']);
    // get range of marks of a student for all subjects for a given gaurdian term wise API
    Route::post('/get_marks_by_term_wise_gaurdian',[DynamicMarksController::class,'getMarksByTermWiseGaurdian']);
    // get range of marks of a student for all subjects for a given teacher term wise API.
    Route::post('/get_marks_by_term_wise_teacher',[DynamicMarksController::class,'getMarksByTermWiseTeacher']);    
    // logout
    Route::post('/logout',[AuthController::class,'logout']);
});
