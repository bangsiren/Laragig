<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class ListingController extends Controller
{
    // Show All Listings

    public function index()
    {

        // dd($request->tag);
        return view('listings.index', [
            'header' => 'Latest Listings',
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }

    // Show Single Listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //    Show Create Form 

    public function create()
    {
        return view('listings.create');
    }
    // Store Listing Data
    public function store(Request $request)
    {
        // dd($request->all());
      $request->validate([
           'title' => 'required',
           'company' => ['required', Rule::unique('listings', 'company')],
           'location' => 'required',
           'website' => 'required',
           'email' => ['required', 'email'],
           'tags' => 'required',
           'description' => 'required',
       ]);
       if($request->file('logo')) {
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
       }
        $formFields = new Listing();
        $formFields->title = $request->title;
        $formFields->company = $request->company;
        $formFields->location = $request->location;
        $formFields->website = $request->website;
        $formFields->email = $request->email;
        $formFields->tags = $request->tags;
        $formFields->description = $request->description;
        $res = $formFields->save();
        if ($res) {
            return redirect('/')->with('message', 'Listing Created Successfully!');
        } else {
            return back()->with('failed', 'Something Went Wrong');
        }
    //    return ->with('message', 'Listinf Created Successfully!');
    }
}
