<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function returnMessage($message,$type){
        $notification = [
            'message' => $message,
            'alert-type' => $type,
        ];
        return redirect()->back()->with($notification);
    }
}
