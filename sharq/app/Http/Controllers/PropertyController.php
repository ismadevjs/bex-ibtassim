<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\Rental;
use App\Models\RentalsType;
use App\Models\Suitability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Expr\FuncCall;

class PropertyController extends Controller
{


    public function index() {
        $rentals = Rental::latest()->paginate(25);
        $amenities = Amenity::all();
        $suitabilities = Suitability::all();
        $rentalsType = RentalsType::all();
        return view('admin.propertiers.rentals', compact('rentals', 'amenities', 'suitabilities', 'rentalsType'));
    }


    public function rentalsAdd() {
        $amenities = Amenity::all();
        $suitabilities = Suitability::all();
        $rentalstype = rentalsType::all();
        return view('admin.propertiers.add', compact('amenities', 'suitabilities', 'rentalstype'));
    }

    public function rentalsEdit($val) {
        $rental = Rental::where('id', $val)->first();
        if ($rental) {
            $amenities = Amenity::all();
            $suitabilities = Suitability::all();
            $rentalstype = rentalsType::all();
            return view('admin.propertiers.rentals-update', compact('amenities', 'suitabilities', 'rentalstype', 'rental'));
        }
        return back()->withErrors(['errors' => 'No Rental found']);
    }


    public function rentalsStore(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'adults' => 'required',
            'bath' => 'required',
            'rooms' => 'required',
            'video' => 'required',
            'location' => 'required',
            'featured_image' => 'required'
        ]);


        $data = [
        "added_by" => auth()->user()->id,
        'name' => $request-> name,
        'description' => $request->description,
        'price' => $request->price ,
        'adults' => $request->adults ,
        'children' => $request->children ,
        'bed' => $request->bed ,
        'bath' => $request->bath ,
        'rooms' => $request->rooms ,
        'video' => $request->video ,
        'location' => $request->location ,
        'featured' => $request->featured ,
        'amenities' => json_encode($request->amenities) ,
        'suitabilities' => json_encode($request->suitabilities) ,
        'rentalsType' => json_encode($request->rentalsType) ,
        'featured_image' => $request->featured_image ,
        'gallery' => $request->gallery
    ];
      
    
         Rental::create($data);



        return redirect()->route('rentals')->withErrors(['errors' => 'Rental added']);
    }
    

    public function rentalsUpdate(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'adults' => 'required',
            'bath' => 'required',
            'rooms' => 'required',
            'video' => 'required',
            'location' => 'required'
        ]);

        $data = [
            "added_by" => auth()->user()->id,
            'name' => $request-> name,
            'description' => $request->description,
            'price' => $request->price ,
            'adults' => $request->adults ,
            'children' => $request->children ,
            'bed' => $request->bed ,
            'bath' => $request->bath ,
            'rooms' => $request->rooms ,
            'video' => $request->video ,
            'location' => $request->location ,
            'featured' => $request->featured ,
            'amenities' => json_encode($request->amenities) ,
            'suitabilities' => json_encode($request->suitabilities) ,
            'rentalsType' => json_encode($request->rentalsType) ,
            'featured_image' => $request->featured_image ,
            'gallery' => $request->gallery
        ];


        // if the user do not uplaod a feature image it will not update 

        if ($request->featured_image == null) {
            unset($data['featured_image']);
        }
      
        if ($request->gallery == null) {
            unset($data['gallery']);
        }
        
      
    
        $check = Rental::where('id', $request->id)->first();

        if ($check) {

            $check->name = $request-> name;
            $check->description = $request->description;
            $check->price = $request->price;
            $check->adults = $request->adults;
            $check->children = $request->children;
            $check->bed = $request->bed;
            $check->bath = $request->bath;
            $check->rooms = $request->rooms;
            $check->video = $request->video;
            $check->location = $request->location;
            $check->featured = $request->featured;
            $check->amenities = $request->amenities;
            $check->suitabilities = $request->suitabilities;
            $check->rentalsType = $request->rentalsType;

            if ($request->featured_image != null) {
                $check->featured_image = $request->featured_image;
            }
            if ($request->gallery != null) {
                $check->featured_image = $request->featured_image;
            }

            $check->save();

            return back()->withErrors(['errors' => $request->name . ' has been updated']);
        } else {
            return back()->withErrors(['errors' => ' Nothing to do! ']);
        }


    }




    public  function rentalsDelete(Request $request) {

        $amn = Rental::find($request->id);
        if(!$amn || $amn->name != $request->name) return back()->withErrors(['errors' => 'Somthing went wrong']);
        

        $amn->delete();

        return back()->withErrors(['errors' => $amn->name . ' has been deleted']);

    }

   


    public function amenities() {
        return view('admin.amenities.amenities', [
            'amenities' => Amenity::latest()->orderBy('id', 'DESC')->paginate(25)
        ]);
    }
    

    public function amenitiesStore(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        $check = Amenity::where('slug', $request->slug)->first();
        

        if ($check) return back()->withErrors(['errors' => 'Slug already in our records']);

        Amenity::create([
            'name' => $request->name,
            'icon' => $request->icon,
            'slug' => $request->slug
        ]);

        return back()->withErrors(['errors' => $request->name . " Just Added"]);

    }

    public function amenitiesdelete(Request $request) {
        
        $amn = Amenity::find($request->id);
        if(!$amn || $amn->name != $request->name) return back()->withErrors(['errors' => 'Somthing went wrong']);
        

        $amn->delete();

        return back()->withErrors(['errors' => $amn->name . ' has been deleted']);
    }

    public function amenitiesUpdate(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);


        $check = Amenity::where('slug', $request->slug)->first();


        if ($check && $check->slug == $request->slug) {
            $check->name = $request->name;
            $check->slug = $request->slug;
            $check->icon = $request->icon;
            $check->save();
            return back()->withErrors(['errors' => $check->name . " Just updated"]);
        } else {
            return back()->withErrors(['errors' => 'Somthing went wrong']);
        }
        
        
        
        return back()->withErrors(['errors' => 'Nothing happend']);

    }

    public function suitabilities() {
        $suitabilities = Suitability::latest()->paginate(25);
        return view('admin.suitability.suitabilities', compact('suitabilities'));
    }

    public function suitabilitiesStore(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        $check = Suitability::where('slug', $request->slug)->first();
        

        if ($check) return back()->withErrors(['errors' => 'Slug already in our records']);

        Suitability::create([
            'name' => $request->name,
            'icon' => $request->icon,
            'slug' => $request->slug
        ]);

        return back()->withErrors(['errors' => $request->name . " Just Added"]);

    }

    public function suitabilitiesdelete(Request $request) {
        
        $amn = Suitability::find($request->id);
        if(!$amn || $amn->name != $request->name) return back()->withErrors(['errors' => 'Somthing went wrong']);
        

        $amn->delete();

        return back()->withErrors(['errors' => $amn->name . ' has been deleted']);
    }

    public function suitabilitiesUpdate(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);


        $check = Suitability::where('slug', $request->slug)->first();


        if ($check && $check->slug == $request->slug) {
            $check->name = $request->name;
            $check->slug = $request->slug;
            $check->icon = $request->icon;
            $check->save();
            return back()->withErrors(['errors' => $check->name . " Just updated"]);
        } else {
            return back()->withErrors(['errors' => 'Somthing went wrong']);
        }
        
        
        
        return back()->withErrors(['errors' => 'Nothing happend']);

    }
    

    // rental types

    public function rentalsType() {
        $rentalsType = RentalsType::latest()->paginate(25);
        return view('admin.propertiers.rentals-type', compact('rentalsType'));
    } 


    public function rentalsTypeStore(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'reqpuired'
        ]);

        $check = RentalsType::where('slug', $request->slug)->first();
        

        if ($check) return back()->withErrors(['errors' => 'Slug already in our records']);

        RentalsType::create([
            'name' => $request->name,
            'icon' => $request->icon,
            'slug' => $request->slug
        ]);

        return back()->withErrors(['errors' => $request->name . " Just Added"]);

    }

    public function rentalsTypedelete(Request $request) {
        
        $amn = RentalsType::find($request->id);
        if(!$amn || $amn->name != $request->name) return back()->withErrors(['errors' => 'Somthing went wrong']);
        

        $amn->delete();

        return back()->withErrors(['errors' => $amn->name . ' has been deleted']);
    }

    public function rentalsTypeUpdate(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);


        $check = RentalsType::where('slug', $request->slug)->first();


        if ($check && $check->slug == $request->slug) {
            $check->name = $request->name;
            $check->slug = $request->slug;
            $check->icon = $request->icon;
            $check->save();
            return back()->withErrors(['errors' => $check->name . " Just updated"]);
        } else {
            return back()->withErrors(['errors' => 'Somthing went wrong']);
        }
        
        
        
        return back()->withErrors(['errors' => 'Nothing happend']);

    }




}
