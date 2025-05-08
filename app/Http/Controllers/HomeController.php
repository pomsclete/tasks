<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * verify the user's role and redirect accordingly
     */
    public function index(){
        if (Auth::user()->role == 'admin') {
            // Redirect to admin dashboard if the user is an admin
            return redirect()->route('admin.dashboard');
        } else {
            // Redirect to user dashboard if the user is a regular user
            return redirect()->route('user.dashboard');
        }
        return redirect()->back();
    }

    public function profile(){
        return view('admin.profile');
    }
}
