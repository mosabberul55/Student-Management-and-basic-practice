<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
  public function index()
  {
    $students = Student::orderBy('id', 'asc')->get();
    return view('index', compact('students'));
  }
  public function search(Request $request)
  {
    $request->validate([
      'search' => 'required|string',
    ]);
    $search_txt = $request->search;
    $students = Student::orderBy('id', 'desc')
        ->where('first_name', 'like', '%'.$search_txt.'%')
        ->orWhere('last_name', 'like', '%'.$search_txt.'%')
        ->orWhere('registration_id', 'like', '%'.$search_txt.'%')
        ->orWhere('roll', 'like', '%'.$search_txt.'%')
        ->orWhere('department_name', 'like', '%'.$search_txt.'%')
        ->orWhere('email', 'like', '%'.$search_txt.'%')
        ->orWhere('mobile_num', 'like', '%'.$search_txt.'%')
        ->orWhere('address', 'like', '%'.$search_txt.'%')
        ->orWhere('info', 'like', '%'.$search_txt.'%')
        ->get();
      return view('search', compact('students'));
  }
  public function create()
  {
    return view('create');
  }
  public function store(Request $request)
  {
    //check validation
    $request->validate([
      'first_name' => 'required|string|max:30',
      'first_name' => 'required|string|max:30',
      'registration_id' => 'required|integer',
      'roll' => 'required|integer',
      'email' => 'required|email|max:50',
      'mobile_num' => 'required|integer',
      'address' => 'required|string|max:255',

    ]);

    $student = new Student;
    $student->first_name = $request->first_name;
    $student->last_name = $request->last_name;
    $student->registration_id = $request->registration_id;
    $student->roll = $request->roll;
    $student->department_name = $request->department_name;
    $student->email = $request->email;
    $student->mobile_num = $request->mobile_num;
    $student->address = $request->address;
    $student->info = $request->info;
    $student->save();
    return redirect()->route('index');
  }
  public function edit($id)
  {
    $student = Student::find($id);
    return view('edit', compact('student'));
  }
  public function update(Request $request, $id)
  {
    //check validation
    $request->validate([
      'first_name' => 'required|string|max:30',
      'first_name' => 'required|string|max:30',
      'registration_id' => 'required|integer|max:8',
      'roll' => 'required|integer|max:3',
      'email' => 'required|email|max:50',
      'mobile_num' => 'required|integer|max:10',
      'address' => 'required|string|max:255',
      'info' => 'nullable',

    ]);
    $student = Student::find($id);
    $student->first_name = $request->first_name;
    $student->last_name = $request->last_name;
    $student->registration_id = $request->registration_id;
    $student->roll = $request->roll;
    $student->department_name = $request->department_name;
    $student->email = $request->email;
    $student->mobile_num = $request->mobile_num;
    $student->address = $request->address;
    $student->info = $request->info;
    $student->save();
    return redirect()->route('index');
  }
  public function delete($id)
  {
    $student = Student::find($id);
    $student->delete();
    return redirect()->route('index');
  }
}
