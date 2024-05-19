<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //dashbaord function to return view backends.dashboard
    public function dashboard(){
        return view('backend.dashboard');
    }
}
