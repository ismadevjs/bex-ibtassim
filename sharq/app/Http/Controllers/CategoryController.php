<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Filier;
class CategoryController extends Controller
{
    
    public function categories() {
        $categories = Category::latest()->orderBy('id', 'DESC')->paginate(25);
        $filiers = Filier::all();
        return view('admin.categories.categories', compact('categories', 'filiers'));
    }
    

    public function categoriesStore(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'filier_id' => 'required',
        ]);



        $check = Category::where('slug', $request->slug)->first();
        
        if ($request->filier_id == '-' || $request->filier_id == '') return back()->withErrors(['errors' => 'Please Add Category']);

        if ($check) return back()->withErrors(['errors' => 'Slug already in our records']);

        Category::create([
            'name' => $request->name,
            'icon' => $request->icon,
            'slug' => $request->slug,
            'filier_id' => $request->filier_id
        ]);

        return back()->withErrors(['errors' => $request->name . " Just Added"]);

    }

    public function categoriesdelete(Request $request) {
        
        $amn = Category::find($request->id);
        if(!$amn || $amn->name != $request->name) return back()->withErrors(['errors' => 'Somthing went wrong']);
        

        $amn->delete();

        return back()->withErrors(['errors' => $amn->name . ' has been deleted']);
    }

    public function categoriesUpdate(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        // dd($request->file('icon'));
        
        if ($request->hasFile('icon')) {
            
            $file = $request->file('icon');
            $filename = $file->getClientOriginalName();
            $request->file('icon')->storeAs('public/icon',$filename);
            
        }
        
        $check = Category::where('slug', $request->slug)->first();
        
        

        if ($check && $check->slug == $request->slug) {
            $check->name = $request->name;
            $check->slug = $request->slug;
                if ($request->filier_id != '-' ) {
                    $check->filier_id = $request->filier_id;
                    // dd('here');
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
