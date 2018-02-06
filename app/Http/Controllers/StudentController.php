<?php
/**
 * namespace App\Http\Controllers\StudentController
 * User: weixuan
 * Date: 2018/1/31
 * Time: 19:04
 * Copyright © ENUCP Inc.All rights reserved.
 */

namespace App\Http\Controllers;

use App\ec\models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Psy\Util\Json;

class StudentController extends Controller
{
    public function index(){
//        $students = Student::get();
        $students = Student::paginate(1);
        return view('student2.index',[
            'students'=>$students
        ]);
    }
    public function edit(){
        return view('student2.edit');
    }
    public function show(){
        return view('student2.show');
    }
    public function save(){
        return redirect('index');
    }
}