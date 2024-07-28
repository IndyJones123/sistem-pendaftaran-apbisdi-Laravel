<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\pt;
use App\Models\individu;
use App\Models\biaya;
use App\Models\User;
use App\Models\link;
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
        $pendingusers = $ptDataPending + $individuDataPending;
        //
        $rejectedusers = $totalusers - $activeusers - $pendingusers;
        $pendingpt = $ptDataPending;
        $pendingindividu = $individuDataPending;

        return view('main/admin/dashboard' , compact('ptData','ptDataActive','individuDataActive','totalusers', 'activeusers', 'rejectedusers', 'pendingpt', 'pendingindividu'));
    }

    public function pt(Request $request)
    {
        // Retrieve the search query from the request
        $search = $request->input('search');
    
        // Start the query for retrieving data
        $query = pt::query();
    
        // Apply search filter if the search query is present
        if ($search) {
            $query->where('namapt', 'like', "%{$search}%")
                  ->orWhere('kodept', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('status', 'like', "%{$search}%");
        }
    
        // Paginate the results, 10 items per page
        $ptData = $query->paginate(10);
    
        // Return view with paginated data and search term
        return view('main/admin/pt', [
            'ptData' => $ptData,
            'search' => $search
        ]);
    }

    public function individu(Request $request)
    {
            $UserData = User::where('usertype', 'user')->get();
            $layoutData = Individu::all();
   
           // Retrieve the search query from the request
           $search = $request->input('search');
   
           // Start the query for retrieving data
           $query = Individu::query();
   
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
           $individuData = $query->paginate(10);
   
           return view('main/admin/individu', [
               'individuData' => $individuData,
               'search' => $search,
               'layoutData' => $layoutData,
               'UserData' => $UserData,
           ]);
    }

    public function biaya()
    {
        //ptData
        $biayaData = biaya::all();

        return view('main/admin/biaya' , compact('biayaData'));
    }

    public function biayaedit($id)
    {
        $data = biaya::find($id);

        return view('main/admin/editbiaya' , compact('data'));
    }

    public function updatebiaya(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'biaya' => 'required|numeric|min:0',
        ]);

        // Find the existing data by id
        $biaya = biaya::find($id);

        // Update the biaya field with the new value from the request
        $biaya->biaya = $validatedData['biaya'];

        // Save the updated data to the database
        $biaya->save();

        // Redirect back to a relevant page with a success message
        return redirect()->route('admin/biaya')->with('success', 'Biaya updated successfully.');
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

    public function sertifikatpt(Request $request)
    {
        $link = link::where('id', 1)->first();
        $currentDate = Carbon::now();
        $individuData = pt::all();
        $currentUserId = Auth::id();
        $layoutData = pt::all();
        $currentDate = Carbon::now();

        $search = $request->input('search');

        // Assuming 'individu' is a model representing the 'individu' table
        $sertifikatKaprodiData = sertifikatkaprodi::query();

        // Apply search filter if the search query is present
        if ($search) {
            $sertifikatKaprodiData->where(function($q) use ($search) {
                $q->orWhere('tglmulai', 'like', "%{$search}%")
                    ->orWhere('tglberakhir', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            });
        }

        $sertifikatKaprodiData = $sertifikatKaprodiData->paginate(10);

        $currentDate = Carbon::now()->toDateString();
        return view('main/admin/sertifikatpt', compact('sertifikatKaprodiData', 'individuData', 'layoutData', 'currentDate' , 'link'));

    }

    public function sertifikatIndividu(Request $request)
    {
        $link = link::where('id', 2)->first();
        $currentDate = Carbon::now();
        $individuData = individu::all();
        $currentUserId = Auth::id();
        $layoutData = individu::all();

        $search = $request->input('search');

        // Assuming 'individu' is a model representing the 'individu' table
        $sertifikatIndividuData = sertifikatindividu::query();

        // Apply search filter if the search query is present
        if ($search) {
            $sertifikatIndividuData->where(function($q) use ($search) {
                $q->orWhere('tglmulai', 'like', "%{$search}%")
                    ->orWhere('tglberakhir', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            });
        }

        $sertifikatIndividuData = $sertifikatIndividuData->paginate(10);

        $currentDate = Carbon::now()->toDateString();
        return view('main/admin/sertifikatindividu', compact('currentDate', 'sertifikatIndividuData', 'individuData', 'layoutData', 'currentDate' , 'link'));

    }


    // -------------------------------------------------------------------- Start Of Link Fitur

    public function link()
    {
        //ptData
        $linkData = link::all();

        return view('main/admin/link' , compact('linkData'));
    }

    public function linkedit($id)
    {
        $linkData = link::find($id);

        return view('main/admin/editlink' , compact('linkData'));
    }

    public function updatelink(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'link' => 'required|string|min:0',
        ]);

        // Find the existing data by id
        $link = link::find($id);

        // Update the biaya field with the new value from the request
        $link->link = $validatedData['link'];

        // Save the updated data to the database
        $link->save();

        // Redirect back to a relevant page with a success message
        return redirect()->route('admin/link')->with('success', 'Biaya updated successfully.');
    }


    // -------------------------------------------------------------------------------------  End Of Link Fitur


}
