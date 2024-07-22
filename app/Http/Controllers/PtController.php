<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\pt;
use App\Models\individu;
use App\Models\sertifikatindividu;
use App\Models\sertifikatkaprodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PtController extends Controller
{
    public function index()
    {
        $ptData = pt::where('id_user', Auth::id())->first();
        $layoutData = pt::where('id_user', Auth::id())->first();
        $currentDate = Carbon::now()->toDateString();
        return view('main/pt/statuspt', compact('currentDate', 'ptData' , 'layoutData'));
    }

    public function detailsdatadosen($id)
    {
        $individuData = individu::where('id_user' , $id)->first();
        $layoutData = pt::where('id_user', Auth::id())->first();  

        return view('main/pt/detailsdatadosen', [
            'individuData' => $individuData,
            'layoutData' => $layoutData,
        ]);
    }

    public function datadosen(Request $request)
    {
            // Retrieve the current user's id_pt
        $currentUserIdPt = Auth::id();
        $layoutData = pt::where('id_user', Auth::id())->first();

        // Retrieve the search query from the request
        $search = $request->input('search');

        // Start the query for retrieving data
        $query = Individu::where('id_pt', $currentUserIdPt);

        // Apply search filter if the search query is present
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('namadosen', 'like', "%{$search}%")
                    ->orWhere('nidn', 'like', "%{$search}%")
                    ->orWhere('notelp', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            });
        }

        // Paginate the results, 10 items per page
        $ptData = $query->paginate(10);

        return view('main/pt/datadosen', [
            'ptData' => $ptData,
            'search' => $search,
            'layoutData' => $layoutData,
        ]);
    }

    public function sertifikatdosen(Request $request)
    {
        $currentUserId = Auth::id();
        $layoutData = pt::where('id_user', Auth::id())->first();

        // Retrieve the search query from the request
        $search = $request->input('search');

        // Assuming 'individu' is a model representing the 'individu' table
        $individuData = SertifikatIndividu::whereIn('id_individu', function($query) use ($currentUserId) {
            $query->select('id_user')
                  ->from('individus')
                  ->where('id_pt', $currentUserId);
        })->with('individu'); // Include the 'individu' relationship
        
        // Apply search filter if the search query is present
        if ($search) {
            $individuData->where(function($q) use ($search) {
                $q->orWhere('tglmulai', 'like', "%{$search}%")
                    ->orWhere('tglberakhir', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            });
        }

        $individuData = $individuData->paginate(10);

        $currentDate = Carbon::now()->toDateString();
        
        return view('main/pt/sertifikatdosen', [
            'currentDate' => $currentDate,
            'individuData' => $individuData,
            'search' => $search,
            'layoutData' => $layoutData,
        ]);

    }

    public function sertifikatpt(Request $request)
    {
        $currentUserId = Auth::id();
        $layoutData = pt::where('id_user', Auth::id())->first();

        $search = $request->input('search');

        // Assuming 'individu' is a model representing the 'individu' table
        $ptData = sertifikatkaprodi::where('id_kaprodi', Auth::id());

        // Apply search filter if the search query is present
        if ($search) {
            $ptData->where(function($q) use ($search) {
                $q->orWhere('tglmulai', 'like', "%{$search}%")
                    ->orWhere('tglberakhir', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            });
        }

        $ptData = $ptData->paginate(10);

        $currentDate = Carbon::now()->toDateString();
        return view('main/pt/sertifikatpt', compact('currentDate', 'ptData', 'layoutData'));
    }

    public function storept(Request $request)
    {
        // Validate the form data
        $request->validate([
            'namapt' => 'required|string|max:255',
            'kodept' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nidn' => 'required|integer',
            'namapengelola' => 'required|string|max:255',
            'telp' => 'required|string|max:255',
            'namakaprodi' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'tgldaftar' => 'required|date',
            'berkas1' => 'required|string|max:2048', // Adjust max file size as needed
            'berkas2' => 'required|string|max:2048', // Adjust max file size as needed
            'status' => 'required|string|max:255',
            'id_user' => 'required|integer',
            'id_biaya' => 'required|integer',
        ]);

        // Process the form data
        $existingRecord = pt::where('id_user', $request->id_user)
                                ->whereIn('status', ['active', 'pending'])
                                ->exists();

        // If exists, prevent storing data and return with error message
        if ($existingRecord) {
            return redirect()->route('pt/statuspt')->with('error', 'Failed to submit form: Active record already exists for this user.');
        }

        // Handle file uploads with custom filenames
        // $berkas1FileName = 'berkas1_' . $request->id_user . '_' . time() . '.' . $request->file('berkas1')->getClientOriginalExtension();
        // $berkas2FileName = 'berkas2_' . $request->id_user . '_' . time() . '.' . $request->file('berkas2')->getClientOriginalExtension();
        // $berkas3FileName = 'berkas3_' . $request->id_user . '_' . time() . '.' . $request->file('berkas3')->getClientOriginalExtension();

        // $berkas1Path = $request->file('berkas1')->storeAs('berkas', $berkas1FileName);
        // $berkas2Path = $request->file('berkas2')->storeAs('berkas', $berkas2FileName);
        // $berkas3Path = $request->file('berkas3')->storeAs('berkas', $berkas3FileName);

        // Perform actions like saving data to the database
        $pt = pt::create([
            'namapt' => $request->namapt,
            'kodept' => $request->kodept,
            'alamat' => $request->alamat,
            'nidn' => $request->nidn,
            'namapengelola' => $request->namapengelola,
            'telp' => $request->telp,
            'namakaprodi' => $request->namakaprodi,
            'email' => $request->email,
            'tgldaftar' => $request->tgldaftar,
            'berkas1' => $request->berkas1,
            'berkas2' => $request->berkas2,
            'status' => $request->status,
            'id_user' => $request->id_user,
            'id_biaya' => $request->id_biaya,
        ]);

        // Redirect or return a response
        return redirect()->route('about')->with('success', 'Form submitted successfully');
    }

    public function editprofile()
    {
        $ptData = pt::where('id_user', Auth::id())->first();
        $layoutData = pt::where('id_user', Auth::id())->first();
        $currentDate = Carbon::now()->toDateString();
        return view('main/pt/editprofile', compact('currentDate', 'ptData' , 'layoutData'));

    }

    public function updatept(Request $request,$id)
    {
        $currentDate = Carbon::now()->toDateString();
            // Retrieve the existing record
        $ptData = Pt::findOrFail($id);

        // Validate the request data
        $request->validate([
            'namapt' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'telp' => 'required|string|max:15',
            'kodept' => 'required|string|max:50',
            'nidn' => 'required|string|max:20',
            'namapengelola' => 'required|string|max:255',
            'namakaprodi' => 'required|string|max:255',
            'berkas1' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'berkas2' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if($request->hasFile('berkas1'))
        {
            $berkas1Name = Str::random(10) . '.' . $request->file('berkas1')->getClientOriginalExtension();
            $request->file('berkas1')->move('data/',$berkas1Name);
            $berkas1 = $berkas1Name;
        }
        if($request->hasFile('berkas2'))
        {
            $berkas2Name = Str::random(10) . '.' . $request->file('berkas1')->getClientOriginalExtension();
            $request->file('berkas2')->move('data/',$berkas2Name);
            $berkas2 = $berkas2Name;
        }

        $ptData->update([
            'namapt' => $request->input('namapt'),
            'email' => $request->input('email'),
            'telp' => $request->input('telp'),
            'kodept' => $request->input('kodept'),
            'nidn' => $request->input('nidn'),
            'namapengelola' => $request->input('namapengelola'),
            'namakaprodi' => $request->input('namakaprodi'),
            'tgldaftar' => $currentDate,
            'status' => "pending",
            'berkas1' => $berkas1,
            'berkas2' => $berkas2,
        ]);

        return redirect()->route('pt/statuspt')->with('success', 'Data updated successfully!');
    }
}
