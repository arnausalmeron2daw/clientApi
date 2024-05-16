<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;



class ProductController extends Controller
{


    public function index()
{
    $response = Http::withToken(session('token'))->get(env('API_URL')."/products");
    $responseAll = $response->json();

    $responseData = isset($responseAll['data']) ? $responseAll['data'] : [];

    return view('product', ['response' => $responseData]);
}


    public function show($id)
    {
        $response = Http::withToken(session('token'))->get(env('API_URL')."/products/{$id}");
        return $response->json();
    }

    public function store(Request $request)
    {
         Http::withToken(session('token'))->post(env('API_URL')."/products", $request->all());
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $response = Http::withToken(session('token'))->put(env('API_URL')."/products/{$id}", $request->all());
        return redirect()->back();
    }

    public function destroy($id)
    {
        $response = Http::withToken(session('token'))->delete(env('API_URL')."/products/{$id}");
        return redirect()->back();
    }
}

