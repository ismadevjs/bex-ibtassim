<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module; 
use App\Models\Category;
use App\Models\Filier;

class ModuleController extends Controller
{
    public function modules() {
        $modules = Module::latest()->orderBy('id', 'DESC')->paginate(25);
        $categories = Category::all();
        $filiers = Filier::all();
        return view('admin.modules.modules', compact('modules', 'categories', 'filiers'));
    }
    

    public function modulesStore(Request $request) {

        $validated =  $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'category_id' => 'required',
            'filier_id' => 'required'
        ]);



        $check = Module::where('slug', $request->slug)->first();
        
        if ($request->category_id == '-' || $request->category_id == '') return back()->withErrors(['errors' => 'Please Add Module']);

        if ($check) return back()->withErrors(['errors' => 'Slug already in our records']);

        Module::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'icon' => $request->icon,
            'category_id' => $request->category_id,
            'filier_id' => $request->filier_id
        ]);

        return back()->withErrors(['errors' => $request->name . " Just Added"]);

    }

    public function modulesdelete(Request $request) {
        
        $amn = Module::find($request->id);
        if(!$amn || $amn->name != $request->name) return back()->withErrors(['errors' => 'Somthing went wrong']);
        

        $amn->delete();

        return back()->withErrors(['errors' => $amn->name . ' has been deleted']);
    }

    public function modulesUpdate(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'category_id' => "required",
            'filier_id' => "required"
        ]);

        // dd($request->file('icon'));
        
        if ($request->hasFile('icon')) {
            
            $file = $request->file('icon');
            $filename = $file->getClientOriginalName();
            $request->file('icon')->storeAs('public/icon',$filename);
            
        }
        
        $check = Module::where('slug', $request->slug)->first();
        
        

        if ($check && $check->slug == $request->slug) {
            $check->name = $request->name;
            $check->slug = $request->slug;
                if ($request->category_id != '-' ) {
                    $check->category_id = $request->category_id;
                }
                if ($request->filier_id != '-' ) {
                    $check->filier_id = $request->filier_id;
                }
                if ($request->icon != null) {
                    $check->icon = $filename;
                }
            $check->save();
            return back()->withErrors(['errors' => $check->name . "Just updated"]);
        } else {
            return back()->withErrors(['errors' => 'Somthing went wrong']);
        }
        
        
        
        return back()->withErrors(['errors' => 'Nothing happend']);

    }
}
