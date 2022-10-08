<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Subject;
use App\Models\Type;
use Illuminate\Http\Request;

class SubjetController extends Controller
{
    public function subjects() {
        $subjects = Subject::latest()->orderBy('id', 'DESC')->paginate(25);
        $types = Type::all();
        $modules = Module::all();
        return view('admin.subjects.subjects', compact('subjects', 'types', 'modules'));
    }
    

    public function subjectsStore(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'pdf' => 'required',
        ]);

        if ($request->module_id == '-' || $request->module_id == '') return back()->withErrors(['errors' => 'Please Add Module']);


        if ($request->type_id == '-' || $request->type_id == '') return back()->withErrors(['errors' => 'Please Add Type']);

    

        Subject::create([
            'name' => $request->name,
            'module_id' => $request->module_id,
            'type_id' => $request->type_id,
            'pdf' => $request->pdf
        ]);

        return back()->withErrors(['errors' => $request->name . " Just Added"]);

    }

    public function subjectsdelete(Request $request) {
        
        $amn = Subject::find($request->id);
        if(!$amn || $amn->name != $request->name) return back()->withErrors(['errors' => 'Somthing went wrong']);
        

        $amn->delete();

        return back()->withErrors(['errors' => $amn->name . ' has been deleted']);
    }

    public function subjectsUpdate(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        
        
        $check = Subject::where('id', $request->id)->first();
        
        if ($request->hasFile('pdf')) {
            
            $file = $request->file('pdf');
            $filename = $file->getClientOriginalName();
            $request->file('pdf')->storeAs('public/pdf',$filename);
            
        }

        if ($check) {
            $check->name = $request->name;
                if ($request->module_id != '-' ) {
                    $check->module_id = $request->module_id;
                }
                if ($request->type_id != '-' ) {
                    $check->type_id = $request->type_id;
                }
                if ($request->pdf != null) {
                    $check->pdf = $filename;
                }

            $check->save();
            return back()->withErrors(['errors' => $check->name . " Just updated"]);
        } else {
            return back()->withErrors(['errors' => ' Somthing went wrong']);
        }
        
        
        
        return back()->withErrors(['errors' => ' Nothing happend']);

    }
}
