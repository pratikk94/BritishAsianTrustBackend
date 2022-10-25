<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DynamicMarks;
class DynamicMarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DynamicMarks::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'studentId' => 'required',
            'subjectId' => 'required',
            'term' => 'required',
            'teacherId' => 'required',
            'gaurdianId' => 'required',
            'marks' => 'required',
        ]);

        return DynamicMarks::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DynamicMarks::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $DynamicMarks = DynamicMarks::find($id);
        $DynamicMarks->update($request->all());
        return $DynamicMarks;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAllStudentMarks(DynamicMarks $DynamicMarks,$termId){

        // return $DynamicMarks->load(['students'=>function ($students) use ($termId) {
        //     $students->with(['marks'=>function ($marks) use ($termId) {
        //         $marks->where('term',$termId);
        //     }]);
        // }
        // ]);
        
    }

    public function getMarksOfStudent(){
        return DynamicMarks::where('studentId',request('studentId'))->get();
    }

    public function getMarksForTermStudents(){
        return DynamicMarks::where('term',request('term'))->get();
    }


    public function getMarksByTerm(){
        return DynamicMarks::where('studentId',request('studentId'))
        ->where('term',request('term'))->get();
    }

    public function getMarksByTermGaurdian(){
        return DynamicMarks::where('studentId',request('studentId'))
        ->where('term',request('term'))->where('gaurdianId',request('gaurdianId'))->get();
    }

    public function getMarksByTermTeacher(){
        return DynamicMarks::where('studentId',request('studentId'))
        ->where('term',request('term'))->where('teacherId',request('teacherId'))->get();
    }

    public function getMarksByTermWiseGaurdian(){
        return DynamicMarks::where('studentId',request('studentId'))
        ->where('gaurdianId',request('gaurdianId'))->get()->groupBy('term');
    }

    public function getMarksByTermWiseTeacher(){
        return DynamicMarks::where('studentId',request('studentId'))
        ->where('teacherId',request('teacherId'))->get()->groupBy('term');
    }

    public function getMarksBySubjectTerm(){
        return DynamicMarks::where('studentId',request('studentId'))
        ->where('subjectId',request('subjectId'))->get()->groupBy('term');
    }

    public function getMarksByTeacherTerm(){
        return DynamicMarks::where('studentId',request('studentId'))
        ->where('teacherId',request('teacherId'))->get()->groupBy('term');
    }

    public function getMarksByGaurdianTerm(){
        return DynamicMarks::where('studentId',request('studentId'))
        ->where('gaurdianId',request('gaurdianId'))->get()->groupBy('term');
    }
}
