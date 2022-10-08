<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function hero() {
     

        if ( Setting::first() === null ) {
            return back()->withErrors(['errors' => 'No Record founds']);
        } else {
            $hero = Setting::first();
            return view ('admin.settings.hero', compact('hero'));
        }
    }
    
    public function heroStore(Request $request) {

        $validated = $request->validate([
            'heading' => 'required',
        ]);
         
        $hero = Setting::find(1)->first();


        if ($request->hero == null) {
            $hero->heading = $request->heading;
            $hero->sub = $request->sub;
        } else {
            $hero->heading = $request->heading;
            $hero->sub = $request->sub;
            $hero->hero = $request->hero;
        }

        $hero->save();
       
        return back()->withErrors('errors', 'Hero section updated');
    }
}
