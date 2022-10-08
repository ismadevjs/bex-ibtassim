<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UploadController extends Controller
{


    public function loginTEst(Request  $request) {
        return $request;
    }
    public function upload(Request $request) {


        
        
        if ($request->hasFile('icon')) {

            $file = $request->file('icon');
            $filename = $file->getClientOriginalName();
            $request->file('icon')->storeAs('public/icon',$filename);
            return $filename;
        }
      
      
        if ($request->hasFile('pdf')) {

            $file = $request->file('pdf');
            $filename = $file->getClientOriginalName();
            $request->file('pdf')->storeAs('public/pdf',$filename);
            return $filename;
        }

       
        

        if ($request->hasFile('gallery')) {

            $file = $request->file('gallery');
            $filename = $file->getClientOriginalName();
            $request->file('gallery')->storeAs('public/gallery',$filename);
            return $filename;
        }



        if ($request->hasFile('featured_image')) {

            $file = $request->file('featured_image');
            $filename = $file->getClientOriginalName();
            $request->file('featured_image')->storeAs('public/featured_image',$filename);
            return $filename;
        }

        return "";
    }
}
