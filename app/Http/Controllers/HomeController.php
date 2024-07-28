<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\biaya;
use App\Models\individu;
use App\Models\pt;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentYear = now()->year; // Get the current year
        $totalIndividu = individu::where('status', "active")->count();
        $totalpt = pt::where('status', "active")->count();
        
        return view('welcome', [
            'currentYear' => $currentYear,
            'totalIndividu' => $totalIndividu,
            'totalpt' => $totalpt
        ]);
    }

    public function about()
    {
        $currentYear = now()->year; // Get the current year
        return view('about', ['currentYear' => $currentYear]);
    }

    public function alur()
    {
        $currentYear = now()->year; // Get the current year
        $biaya = biaya::all();

        return view('alur', ['currentYear' => $currentYear, 'biaya' => $biaya]);
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


}
