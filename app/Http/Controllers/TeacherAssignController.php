<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Group;
use App\Models\Batch;
use App\Models\User;

class TeacherAssignController extends Controller
{
  public function index(){
        $students = Student::all();
        $groups = Group::all();
        $batches = Batch::all();
        $teachers =User::all();
    return view('admin.teacher_group_assign.index',compact('groups','students','groups','batches','teachers'));
  }

  public function create(){
    $students = Student::all();
    $groups = Group::all();
    $batches = Batch::all();
    $teachers =User::all();
return view('admin.teacher_group_assign.create',compact('groups','students','groups','batches','teachers'));
}
}
