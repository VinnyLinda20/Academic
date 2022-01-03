<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();

        return view('student.index', ['students' => $students]);
    }

    public function create(){
        return view('student.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required',
        ]);

        $student = new Student([
            'code' => $request->get('code'),
            'name' => $request->get('name'),
            'gender' => $request->get('gender'),
            'birth_place' => $request->get('birth_place'),
            'birth_date' => $request->get('birth_date'),
        ]);
        $student->save();
        return redirect('/student')->with('success', 'Student saved!');
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required',
        ]);

        $student = Student::find($id);            
        $student->code = $request->get('code');
        $student->name = $request->get('name');
        $student->gender = $request->get('gender');
        $student->birth_place = $request->get('birth_place');
        $student->birth_date = $request->get('birth_date');
        $student->save();

        return redirect('/student')->with('success', 'Student updated!');
    }


    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect('/student')->with('success', 'Student deleted');
    }

}