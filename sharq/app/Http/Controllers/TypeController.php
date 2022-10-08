<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Category;
use App\Models\Module;
class TypeController extends Controller
{
    public function types() {
        $types = Type::latest()->orderBy('id', 'DESC')->paginate(25);
        $categories = Category::all();
        $modules = Module::all();
        return view('admin.types.types', compact('types', 'categories', 'modules'));
    }
    

    public function typesStore(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'module_id' => 'required',
        ]);


        // khasi nrigl hana kolchi


        $check = Type::where('id', $request->id)->first();
        
        if ($request->module_id == '-' || $request->module_id == '') return back()->withErrors(['errors' => 'Please Add module']);

        if ($check) return back()->withErrors(['errors' => 'module already in our records']);

        Type::create([
            'name' => $request->name,
            'module_id' => $request->module_id
        ]);

        return back()->withErrors(['errors' => $request->name . " Just Added"]);

    }

    public function typesdelete(Request $request) {
        
        $amn = Type::find($request->id);
        if(!$amn || $amn->name != $request->name) return back()->withErrors(['errors' => 'Somthing went wrong']);
        

        $amn->delete();

        return back()->withErrors(['errors' => $amn->name . ' has been deleted']);
    }

    public function typesUpdate(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'module_id' => 'required',
        ]);

        
        
        $check = Type::where('id', $request->id)->first();
        
        

        if ($check) {
            $check->name = $request->name;
                if ($request->module_id != '-' ) {
                    $check->module_id = $request->module_id;
                }
               
            $check->save();
            return back()->withErrors(['errors' => $check->name . "Just updated"]);
        } else {
            return back()->withErrors(['errors' => 'Somthing went wrong']);
        }
        
        
        
        return back()->withErrors(['errors' => 'Nothing happend']);

    }
}
