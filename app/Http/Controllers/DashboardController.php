<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    function index(){
       return view('dashboard');
    }

    
}
