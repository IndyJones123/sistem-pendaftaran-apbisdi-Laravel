<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\individu;
use Carbon\Carbon;
use App\Models\pt;
use App\Models\sertifikatindividu;
use Illuminate\Support\Facades\Auth;

class OperatorController extends Controller
{
    public function index()
    {
        //ptData
        $ptData = pt::all()->count();
        $ptDataActive  = pt::where('status', 'active')->count();
        $ptDataPending = pt::where('status', 'pending')->count();

        //individuData
        $individuData = individu::all()->count();
        $individuDataActive = individu::where('status', 'active')->count();
        $individuDataPending = individu::where('status', 'pending')->count();

        //Parsed Data
        $totalusers = $ptData + $individuData;
        $activeusers = $ptDataActive + $individuDataActive;
        $rejectedusers = $totalusers - $activeusers;
        $pendingpt = $ptDataPending;
        $pendingindividu = $individuDataPending;

        return view('main/operator/dashboard' , compact('totalusers', 'activeusers', 'rejectedusers', 'pendingpt', 'pendingindividu'));
    }

    public function individu()
    {
        $individuData = individu::all();
        return view('main/operator/individu' , compact('individuData'));
    }

    public function pt()
    {
        $ptData = pt::all();
        return view('main/operator/pt' , compact('ptData'));
    }



}
