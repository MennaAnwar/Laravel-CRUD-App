<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    protected $student;
    public function __construct(){
        $this->student = new Student();
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response['employees'] = $this->student->all();
        return view('pages.index')->with($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->student->create($request->all());
        return redirect()->back();    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response['employee'] = $this->student->find($id);
        return view('pages.edit')->with($response);    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = $this->student->find($id);
        $employee->update(array_merge($employee->toArray(), $request->toArray()));
        return redirect('student');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = $this->student->find($id);
        $employee->delete();
        return redirect('student');    }
}
