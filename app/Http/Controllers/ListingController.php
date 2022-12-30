<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\PseudoTypes\List_;

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
      
        $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

    
        $formFields = new Listing();
        $formFields->title = $request->title;
        $formFields->company = $request->company;
        $formFields->user_id = $request->user_id;
        $formFields->location = $request->location;
        $formFields->website = $request->website;
        $formFields->email = $request->email;
        $formFields->tags = $request->tags;
        $formFields->description = $request->description;

        if ($request->hasFile('logo')) {
            $formFields->logo = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        $res = $formFields->save();
        if ($res) {
            return redirect('/')->with('message', 'Listing Created Successfully!');
        } else {
            return back()->with('failed', 'Something Went Wrong');
        }
        //    return ->with('message', 'Listinf Created Successfully!');
    }

    // Store Listing Data
    public function update(Request $request, Listing $listing)
    {

        // Make Sure logged in user is onwer
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }
      
        $request->validate([
            'title' => 'required',
            'logo' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

    
        $formFields = new Listing();
        $formFields->title = $request->title;
        $formFields->user_id = $request->user_id;
        $formFields->logo = $request->logo;
        $formFields->company = $request->company;
        $formFields->location = $request->location;
        $formFields->website = $request->website;
        $formFields->email = $request->email;
        $formFields->tags = $request->tags;
        $formFields->description = $request->description;

        if ($request->hasFile('logo')) {
            $formFields->logo = $request->file('logo')->store('logos', 'public');
        }

        $res = $formFields->save();
        if ($res) {
            return redirect('./')->with('message', 'Listing Updated Successfully!');
        } else {
            return back()->with('failed', 'Something Went Wrong');
        }

        // return ->with('message', 'Listinf Created Successfully!');
    }

    // Show Edit Listing
    public function edit (Listing $listing) {
        return view('listings.edit', ['listing' => $listing]);
    }

    // Delete Listing

     public function destroy(Listing $listing) {

          // Make Sure logged in user is onwer
          if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }

        $listing->delete();
        return redirect('/')->with('message', 'Listing Deleted Successfully');
     }

    //  Manage Listings 
     public function manage()
    {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
