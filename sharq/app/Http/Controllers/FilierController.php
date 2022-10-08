<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filier;

class FilierController extends Controller
{
    
    public function filiers() {
        return view('admin.filiers.filiers', [
            'filiers' => Filier::latest()->orderBy('id', 'DESC')->paginate(25)
        ]);
    }
    

    public function filiersStore(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);



        $check = Filier::where('slug', $request->slug)->first();
        
        if ($check) return back()->withErrors(['errors' => 'Slug already in our records']);

        Filier::create([
            'name' => $request->name,
            'icon' => $request->icon,
            'slug' => $request->slug
        ]);

        return back()->withErrors(['errors' => $request->name . " Just Added"]);

    }

    public function filiersdelete(Request $request) {
        
        $amn = Filier::find($request->id);
        if(!$amn || $amn->name != $request->name) return back()->withErrors(['errors' => 'Somthing went wrong']);
        

        $amn->delete();

        return back()->withErrors(['errors' => $amn->name . ' has been deleted']);
    }



    public function filiersUpdate(Request $request) {
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
        
        $check = Filier::where('slug', $request->slug)->first();
        
        

        if ($check && $check->slug == $request->slug) {
            $check->name = $request->name;
            $check->slug = $request->slug;
               
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
