<?php

namespace App\Http\Controllers\Upload;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    //
     public function index()
     {
         return view('upload/index');
     }

     public function store(Request $request)
     {
      //dd($request);
      //return $request->file('image');
     return $request->image->store('public');
      //dd($request->image);
     }
}
