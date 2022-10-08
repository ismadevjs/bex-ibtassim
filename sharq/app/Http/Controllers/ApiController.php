<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Filier;
use App\Models\Api;
use App\Models\Category;
use App\Models\Module;
use App\Models\Type;
use App\Models\Subject;
use Log;
class ApiController extends Controller
{
    public function token() {
        $api = Api::latest()->first();
        return view ('admin.api.token', compact('api'));
    }

    public function generate(Request $request) { 

        $getApi = Api::latest()->first();

        if ($getApi == null) {
            if (auth()->user()) { 
                Api::create([
                    'token' => Hash::make(Auth::user()->name)
                ]);
            }
        } else {
            if (auth()->user()) { 
              $getApi->token = Hash::make(Auth::user()->name);
            };
        }
    
        
        return redirect()->route('api.token.view')->withErrors(['errors' => 'Token generated']);
    }

    public function filiers() {
            $api = Filier::latest()->get();
            return response()->json($api, 200);
    }

    public function categories($filier) {
            $api = Category::where('filier_id', $filier)->get();
            return response()->json($api, 200);
    }
    public function modules($filier, $categories) {
            $api = Module::where('filier_id', $filier)->where('category_id', $categories)->get();
            return response()->json($api, 200);
    }
    public function type($module) {
            $api = Type::where('module_id', $module)->get();
            return response()->json($api, 200);
    }
    public function subject($module, $type) {
            $api = Subject::where('module_id', $module)->where('type_id', $type)->get();
            return response()->json($api, 200);
    }
}
