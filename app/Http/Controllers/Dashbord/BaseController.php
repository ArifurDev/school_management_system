<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\User;
use PhpParser\Node\Stmt\TryCatch;

class BaseController extends Controller
{
    public function returnMessage($message, $type)
    {
        $notification = [
            'message' => $message,
            'alert-type' => $type,
        ];

        return redirect()->back()->with($notification);
    }


    //get data 
    public function getData($class)
    {
            $subjects = Subject::where('classes_id',$class)->latest()->get();
            $students  = User::where('student_status', 'running')->where('class_id',$class)->latest()->get();
            return response()->json(['subjects' => $subjects , 'students' => $students]);
    }
}
