<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\individu;
use Carbon\Carbon;
use App\Models\pt;
use App\Models\sertifikatindividu;
use Illuminate\Support\Facades\Auth;

class IndividuController extends Controller
{
    public function index()
    {
        $ptData = pt::where('status', 'active')->get();
        $individuData = individu::where('id_user', Auth::id())->first();
        $currentDate = Carbon::now()->toDateString();
        return view('main/user/dashboard', compact('currentDate', 'ptData', 'individuData'));
    }

    public function sertifikat()
    {
        $individuData = individu::where('id_user', Auth::id())->first();
        $sertifikatindividu = sertifikatindividu::where('id_individu', Auth::id())->get();
        $currentDate = Carbon::now()->toDateString();
        return view('main/user/sertifikat', compact('currentDate', 'sertifikatindividu', 'individuData'));
    }

    public function storeindividu(Request $request)
    {
        // Validate the form data
        $request->validate([
            'namadosen' => 'required|string|max:255',
            'notelp' => 'required|integer',
            'nidn' => 'required|integer',
            'email' => 'required|string|email|max:255',
            'dokumen1' => 'required|string', // Adjust max file size as needed
            'dokumen2' => 'required|string', // Adjust max file size as needed
            'dokumen3' => 'required|string', // Adjust max file size as needed
            'status' => 'required|string|max:255',

            'id_pt' => 'required|integer|max:255',
            'id_user' => 'required|integer',
            'id_biaya' => 'required|integer',
        ]);


        // Process the form data
        $existingRecord = individu::where('id_user', $request->id_user)
                                ->whereIn('status', ['active', 'pending'])
                                ->exists();

        // If exists, prevent storing data and return with error message
        if ($existingRecord) {
            return redirect()->route('user/dashboard')->with('error', 'Failed to submit form: Active record already exists for this user.');
        }

        // Handle file uploads with custom filenames
        // $dokumen1FileName = 'dokumen1_' . $request->id_user . '_' . time() . '.' . $request->file('dokumen1')->getClientOriginalExtension();
        // $dokumen2FileName = 'dokumen2_' . $request->id_user . '_' . time() . '.' . $request->file('dokumen2')->getClientOriginalExtension();
        // $berkas3FileName = 'berkas3_' . $request->id_user . '_' . time() . '.' . $request->file('berkas3')->getClientOriginalExtension();

        // $dokumen1Path = $request->file('dokumen1')->storeAs('berkas', $dokumen1FileName);
        // $dokumen2Path = $request->file('dokumen2')->storeAs('berkas', $dokumen2FileName);
        // $berkas3Path = $request->file('berkas3')->storeAs('berkas', $berkas3FileName);

        // Perform actions like saving data to the database
        $individu = individu::create([
        'namadosen' => $request->namadosen,
        'nidn' => $request->nidn,
        'notelp' => $request->notelp,
        'email' => $request->email,
        'dokumen1' => $request->dokumen1,
        'dokumen2' => $request->dokumen2,
        'dokumen3' => $request->dokumen3,
        'status' => $request->status,
        'id_pt' => $request->id_pt,
        'id_user' => $request->id_user,
        'id_biaya' => $request->id_biaya,
    ]);

        // Redirect or return a response
        return redirect()->route('user/dashboard')->with('success', 'Form submitted successfully');
    }
}
