<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;


class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function reg(Request $request) {
        $response = Http::post(env('API_URL') .'/register', $request->all());
    
        if ($response->successful()) {
            return redirect()->route('login.index');
        } else {
            return redirect()->route('register.index');
        }
    }
}
