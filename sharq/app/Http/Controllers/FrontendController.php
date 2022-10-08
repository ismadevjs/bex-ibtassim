<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function index() {
        $rentals = Rental::latest()->paginate(9);
        return view('frontend.index', compact('rentals'));
    }
    public function details($product) {
        $product = Rental::where('id', $product)->first();
        $amenities = Amenity::all();
        $suitabilities = Suitability::all();
        $rentalsType = RentalsType::all();
        if ($product == null) {
            
            return back();

        } else {

            return view('frontend.details', compact('product', 'suitabilities', 'amenities', 'rentalsType'));
        }
    }
}
