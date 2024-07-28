<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\individu;
use App\Models\pt;
use Carbon\Carbon;
use App\Models\sertifikatindividu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class IndividuController extends Controller
{
    public function index()
    {
        $ptData = pt::where('status', 'active')->get();
        $individuData = individu::where('id_user', Auth::id())->first();
        $currentDate = Carbon::now()->toDateString();
        return view('main/user/dashboard', compact('currentDate', 'individuData', 'ptData'));
    }

    public function sertifikat(Request $request)
    {
        $individuData = individu::where('id_user', Auth::id())->first();
        $currentUserId = Auth::id();
        $layoutData = individu::where('id_user', Auth::id())->first();

        $search = $request->input('search');

        // Assuming 'individu' is a model representing the 'individu' table
        $sertifikatindividu = sertifikatindividu::where('id_individu', Auth::id());

        // Apply search filter if the search query is present
        if ($search) {
            $sertifikatindividu->where(function($q) use ($search) {
                $q->orWhere('tglmulai', 'like', "%{$search}%")
                    ->orWhere('tglberakhir', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            });
        }

        $sertifikatindividu = $sertifikatindividu->paginate(10);

        $currentDate = Carbon::now()->toDateString();
        return view('main/user/sertifikat', compact('currentDate', 'sertifikatindividu', 'individuData', 'layoutData'));
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

    public function editprofile()
    {
        $individuData = individu::where('id_user', Auth::id())->first();
        $layoutData = individu::where('id_user', Auth::id())->first();
        $currentDate = Carbon::now()->toDateString();
        return view('main/user/editprofile', compact('currentDate', 'individuData' , 'layoutData'));

    }

    public function updateuser(Request $request, $id)
    {
        $currentDate = Carbon::now()->toDateString();
            // Retrieve the existing record
        $individuData = individu::where('id_user', $id)->firstOrFail();

        
        // Validate the request data
        $request->validate([
            'namadosen' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'notelp' => 'required|string|max:15',
            'nidn' => 'required|string|max:20',
            'dokumen1' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'dokumen2' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if($request->hasFile('dokumen1'))
        {
            $dokumen1Name = Str::random(10) . '.' . $request->file('dokumen1')->getClientOriginalExtension();
            $request->file('dokumen1')->move('data/',$dokumen1Name);
            $dokumen1 = $dokumen1Name;
        }
        if($request->hasFile('dokumen2'))
        {
            $dokumen2Name = Str::random(10) . '.' . $request->file('dokumen1')->getClientOriginalExtension();
            $request->file('dokumen2')->move('data/',$dokumen2Name);
            $dokumen2 = $dokumen2Name;
        }

        $individuData->update([
            'namadosen' => $request->input('namadosen'),
            'email' => $request->input('email'),
            'notelp' => $request->input('notelp'),
            'nidn' => $request->input('nidn'),
            'tgldaftar' => $currentDate,
            'status' => "pending",
            'dokumen1' => $dokumen1,
            'dokumen2' => $dokumen2,
        ]);

        return redirect()->route('user/dashboard')->with('success', 'Data updated successfully!');
    }
}
