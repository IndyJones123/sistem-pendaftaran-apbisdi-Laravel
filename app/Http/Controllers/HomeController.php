<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\Models\PT;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentYear = now()->year; // Get the current year
        return view('welcome', ['currentYear' => $currentYear]);
    }

    public function about()
    {
        $currentYear = now()->year; // Get the current year
        return view('about', ['currentYear' => $currentYear]);
    }

    public function alur()
    {
        $currentYear = now()->year; // Get the current year
        return view('alur', ['currentYear' => $currentYear]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Home $Home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $Home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Home $Home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $Home)
    {
        //
    }
}
