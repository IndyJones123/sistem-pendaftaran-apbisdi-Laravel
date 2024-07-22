<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\individu;
use Carbon\Carbon;
use App\Models\pt;
use App\Models\sertifikatindividu;
use App\Models\sertifikatkaprodi;
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

    public function individu(Request $request)
    {
        // Retrieve the search query from the request
        $search = $request->input('search');

        // Start the query for retrieving data
        $query = individu::query();

        // Apply search filter if the search query is present
        if ($search) {
            $query->where('namadosen', 'like', "%{$search}%")
                ->orWhere('nidn', 'like', "%{$search}%")
                ->orWhere('notelp', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%");
        }

        // Paginate the results, 10 items per page
        $individuData = $query->paginate(10);

        return view('main/operator/individu', [
            'individuData' => $individuData,
            'search' => $search
        ]);
        // return view('main/operator/individu' , compact('individuData'));
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
        return view('main/operator/pt', [
            'ptData' => $ptData,
            'search' => $search
        ]);
    }

    public function approvept($id)
    {
        $data = pt::find($id);
        $currentYear = Carbon::now()->toDateString();
        $nextYear = Carbon::now()->addYear()->toDateString();
        
        if ($data) {
            $data->status = 'active';
            $data->save();

            $sertifikatkaprodi = sertifikatkaprodi::create([
                'id_kaprodi' => $data->id_user,
                'tglmulai' => $currentYear,
                'tglberakhir' => $nextYear,
                'status' => "Active",
            ]);

            return redirect()->back()->with('success', 'Status updated to active.');
        }
        
        return redirect()->back()->with('error', 'Data not found.');
    }
    
    public function disapprovept($id)
    {
        $data = pt::find($id);
        
        if ($data) {
            $data->status = 'Ditolak';
            $data->save();
            
            return redirect()->back()->with('success', 'Status updated to failed.');
        }
        
        return redirect()->back()->with('error', 'Data not found.');
    }

    public function nonactivept($id)
    {
        $data = pt::find($id);
        
        if ($data) {
            $data->status = 'nonactive';
            $data->save();
            
            return redirect()->back()->with('success', 'Status updated to failed.');
        }
        
        return redirect()->back()->with('error', 'Data not found.');
    }

    public function approveuser($id)
    {
        $data = individu::find($id);
        
        if ($data) {
            $data->status = 'active';
            $data->save();

            $currentYear = Carbon::now()->toDateString();
            $nextYear = Carbon::now()->addYear()->toDateString();

            $sertifikatindividu = sertifikatindividu::create([
                'id_individu' => $data->id_user,
                'tglmulai' => $currentYear,
                'tglberakhir' => $nextYear,
                'status' => "active",
            ]);

            return redirect()->back()->with('success', 'Status updated to active.');
        }
        
        return redirect()->back()->with('error', 'Data not found.');
    }
    
    public function disapproveuser($id)
    {
        $data = individu::find($id);
        
        if ($data) {
            $data->status = 'ditolak';
            $data->save();
            
            return redirect()->back()->with('success', 'Status updated to failed.');
        }
        
        return redirect()->back()->with('error', 'Data not found.');
    }

    public function nonactiveuser($id)
    {
        $data = individu::find($id);
        
        if ($data) {
            $data->status = 'nonactive';
            $data->save();
            
            return redirect()->back()->with('success', 'Status updated to failed.');
        }
        
        return redirect()->back()->with('error', 'Data not found.');
    }



}
