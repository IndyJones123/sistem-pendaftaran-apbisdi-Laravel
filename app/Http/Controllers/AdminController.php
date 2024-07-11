<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\pt;
use App\Models\individu;
use App\Models\biaya;
use App\Models\User;
use App\Models\sertifikatindividu;
use App\Models\sertifikatkaprodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class AdminController extends Controller
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

        return view('main/admin/dashboard' , compact('ptData','ptDataActive','individuDataActive','totalusers', 'activeusers', 'rejectedusers', 'pendingpt', 'pendingindividu'));
    }

    public function pt()
    {
        //ptData
        $ptData = pt::all();

        return view('main/admin/pt' , compact('ptData'));
    }

    public function individu()
    {
        //ptData
        $individuData = individu::all();

        return view('main/admin/individu' , compact('individuData'));
    }

    public function biaya()
    {
        //ptData
        $biayaData = biaya::all();

        return view('main/admin/biaya' , compact('biayaData'));
    }

    public function operator()
    {
        //ptData
        $operatorData = User::where('usertype', 'operator')->get();

        foreach ($operatorData as $operator) {
            try {
                $operator->decrypted_password = Crypt::decryptString($operator->password);
            } catch (DecryptException $e) {
                // Handle the exception if the decryption fails
                $operator->decrypted_password = 'Decryption failed';
            }
        }

        return view('main/admin/operator' , compact('operatorData'));
    }

    public function sertifikatpt()
    {

        $sertifikatKaprodiData = sertifikatkaprodi::all();
        $currentDate = Carbon::now();

        return view('main/admin/sertifikatpt' , compact('sertifikatKaprodiData','currentDate'));
    }

    public function sertifikatIndividu()
    {
        //ptData
        $sertifikatIndividuData = sertifikatindividu::all();
        $currentDate = Carbon::now();


        return view('main/admin/sertifikatindividu' , compact('sertifikatIndividuData','currentDate'));
    }
   
}
