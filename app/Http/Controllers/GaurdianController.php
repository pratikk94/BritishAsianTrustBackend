<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gaurdian;
class GaurdianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Gaurdian::all();
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
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phoneNumber' => 'required'
            ]);

        return Gaurdian::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Gaurdian::find($id);
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
        $Gaurdian = Gaurdian::find($id);
        $Gaurdian->update($request->all());
        return $Gaurdian;
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

    public function getAllStudentMarks(Gaurdian $gaurdian,$termId){

        return $gaurdian->load(['students'=>function ($students) use ($termId) {
            $students->with(['marks'=>function ($marks) use ($termId) {
                $marks->where('term',$termId);
            }]);
        }
        ]);
        
    }


}
