<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\pt;
use Illuminate\Support\Facades\Auth;

class PtController extends Controller
{
    public function index()
    {
        $ptData = pt::where('id_user', Auth::id())->first();
        $currentDate = Carbon::now()->toDateString();
        return view('main/pt/statuspt', compact('currentDate', 'ptData'));
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
            'berkas3' => 'required|string|max:2048', // Adjust max file size as needed
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
            'berkas3' => $request->berkas3,
            'status' => $request->status,
            'id_user' => $request->id_user,
            'id_biaya' => $request->id_biaya,
        ]);

        // Redirect or return a response
        return redirect()->route('about')->with('success', 'Form submitted successfully');
    }
}
