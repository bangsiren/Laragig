<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Show All Listings

    public function index()
    {
        return view('listings', [
            'header' => 'Latest Listings',
            'listings' => Listing::all()
        ]);
    }

    // Show Single Listing
    public function show(Listing $listing)
    {
        return view('listing', [
            'listing' => $listing
      ]);
    }
}
