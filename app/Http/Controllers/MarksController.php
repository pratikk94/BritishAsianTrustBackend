<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marks;
use App\Models\Student;

class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Marks::all();
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
            'gaurdianId' => 'required',
            'teacherId' => 'required',
            'term' => 'required',
            'english' => 'required',
            'maths' => 'required',
            'science' => 'required',
            'socialScience' => 'required',
            'computer' => 'required',
        ]);

        return Marks::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student,$termId)
    {
        return $student->load(['marks'=>function ($marks) use ($termId) {
            $marks->where('term',$termId);
        }]);

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
        $Marks = Marks::find($id);
        $Marks->update($request->all());
        return $Marks;
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

    public function searchStudent(){
        
    }


}
