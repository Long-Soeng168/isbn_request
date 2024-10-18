<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IsbnRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class IsbnRequestController extends Controller
{
     // Display all ISBN Requests
     public function index()
     {
         return view('isbn_requests.index');
     }

     // Show the form for creating a new ISBN request
     public function create()
     {
         return view('isbn_requests.create');
     }

     public function show($id)
     {
         return view('isbn_requests.show', compact('id'));
     }
     public function edit($id)
     {
         return view('isbn_requests.edit', compact('id'));
     }


     public function publisher_register()
     {
        return view('isbn_requests.publisher_register');
     }

     public function publisher_login()
     {
        return view('isbn_requests.publisher_login');
     }

     public function store_publisher_register(Request $request)
     {
       // Validate input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255|unique:users',
            'address' => 'required|string|max:255',
            'facebookName' => 'required|string|max:255',
            'user_type' => 'required|string|max:255',
            'publicationsEachYear' => 'required|string|max:20',
            'password' => 'required|string|min:4|confirmed',
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'facebook_name' => $request->facebookName,
            'publications_each_year' => $request->publicationsEachYear,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->user_type);

        // Log the user in
        Auth::login($user);

        // Redirect to the desired route after login
        return redirect('isbn_requests/create')->with('success', 'Registration successful!');
     }

}
