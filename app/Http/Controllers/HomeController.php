<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\biaya;
use App\Models\individu;
use App\Models\pt;
use App\Models\link;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ig = link::where('id', 1)->first();
        $wa = link::where('id', 2)->first();
        $email = link::where('id', 3)->first();
        $currentYear = now()->year; // Get the current year
        $totalIndividu = individu::where('status', "active")->count();
        $totalpt = pt::where('status', "active")->count();
        
        return view('welcome', [
            'currentYear' => $currentYear,
            'totalIndividu' => $totalIndividu,
            'totalpt' => $totalpt,
            'ig' => $ig,
            'wa' => $wa,
            'email' => $email,
        ]);
    }

    public function about()
    {
        $ig = link::where('id', 1)->first();
        $wa = link::where('id', 2)->first();
        $email = link::where('id', 3)->first();
        $currentYear = now()->year; // Get the current year
        return view('about', [
            'currentYear' => $currentYear,
            'ig' => $ig,
            'wa' => $wa,
            'email' => $email,]);
    }   

    public function alur()
    {
        $ig = link::where('id', 1)->first();
        $wa = link::where('id', 2)->first();
        $email = link::where('id', 3)->first();
        $currentYear = now()->year; // Get the current year
        $biaya = biaya::all();

        return view('alur', [
            'currentYear' => $currentYear, 
            'biaya' => $biaya, 
            'ig' => $ig,
            'wa' => $wa,
            'email' => $email,]);
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
