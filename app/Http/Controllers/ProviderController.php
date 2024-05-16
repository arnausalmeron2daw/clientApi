<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ProviderController extends Controller
{

    public function index()
    {
        $response = Http::withToken(session('token'))->get(env('API_URL') . "/provider");
        $responseAll = $response->json();

        $responseData = isset($responseAll['data']) ? $responseAll['data'] : [];

        return view('provider', ['response' => $responseData]);
    }

    public function show($id)
    {
        $response = Http::withToken(session('token'))->get(env('API_URL') . "/provider/{$id}");
        return $response->json();
    }

    public function store(Request $request)
    {
        $response = Http::withToken(session('token'))->post(env('API_URL') . "/provider", $request->all());
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $response = Http::withToken(session('token'))->put(env('API_URL') . "/provider/{$id}", $request->all());
        return redirect()->back();
    }

    public function destroy($id)
    {
        $response = Http::withToken(session('token'))->delete(env('API_URL') . "/provider/{$id}");
        return redirect()->back();
    }
}
