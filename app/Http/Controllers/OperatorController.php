<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\individu;
use Carbon\Carbon;
use App\Models\pt;
use App\Models\sertifikatindividu;
use App\Models\sertifikatkaprodi;
use Illuminate\Support\Facades\Auth;


//Mail
use App\Mail\PtApproved;
use App\Mail\PtDisapprove;
use App\Mail\DosenApproved;
use App\Mail\DosenDisapprove;
use Illuminate\Support\Facades\Mail;


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

    public function editsertifpt(Request $request, $id)
    {
        $data = sertifikatkaprodi::where("id_kaprodi", $id)->where("status", "active")->first();

        $request->validate([
            'link' => 'required|string|max:255',
            'link2' => 'required|string|max:255',
        ]);

        if($data)
        {
            $data->link = $request->link;
            $data->link2 = $request->link2;
            $data->save();

            return redirect()->back()->with('success', 'Status updated to active.');
        }

        return redirect()->back()->with('error', 'Data not found.');
    }

    public function approvept(Request $request, $id)
    {
        $request->validate([
            'link' => 'required|string|max:255',
            'link2' => 'required|string|max:255',
            'submission_token' => 'required|string|max:255',
        ]);


        // Check for the submission token
    if (Session::get('last_submission_token') !== $request->input('submission_token')) {
        // Store the token so it can't be reused
        Session::put('last_submission_token', $request->input('submission_token'));

            $data = pt::find($id);
            $currentYear = Carbon::now();
            $nextYear = Carbon::now()->addYear();
            
            if ($data) {
                $data->status = 'active';
                $data->save();

                $sertifikatkaprodi = sertifikatkaprodi::create([
                    'id_kaprodi' => $data->id_user,
                    'tglmulai' => $currentYear->toDateString(),
                    'tglberakhir' => $nextYear->toDateString(),
                    'status' => "active",
                    'link' => $request->link,
                    'link2' => $request->link2,
                ]);

                // Send email notification
                $emailData = (object)[
                    'namakaprodi' => $data->namakaprodi, // assuming 'name' field exists
                    'namapt' => $data->namapt,
                    'start_date' => $currentYear->format('d - m - Y'),
                    'end_date' => $nextYear->format('d - m - Y'),
                    'link' => $request->link,
                    'link2' => $request->link2,
                ];
                Mail::to($data->email)->send(new PtApproved($emailData));

                return redirect()->back()->with('success', 'Status updated to active.');
            }

            return redirect()->back()->with('error', 'Data not found.');
        }

        return redirect()->back()->with('error', 'Invalid submission token or submission already processed.');
    }

    
    public function disapprovept($id)
    {
        $data = pt::find($id);
        
        if ($data) {
            $data->status = 'ditolak';
            $data->save();

            // Send email notification
            $emailData = (object)[
                'namakaprodi' => $data->namakaprodi, // assuming 'name' field exists
                'namapt' => $data->namapt,
            ];
            Mail::to($data->email)->send(new PtDisapprove($emailData));
            
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

    public function editsertifuser(Request $request, $id)
    {
        $data = sertifikatindividu::where("id_individu", $id)->where("status", "active")->first();

        $request->validate([
            'link' => 'required|string|max:255',
            'link2' => 'required|string|max:255',
        ]);

        

        if($data)
        {
            $data->link = $request->link;
            $data->link2 = $request->link2;
            $data->save();

            return redirect()->back()->with('success', 'Status updated to active.');
        }

        return redirect()->back()->with('error', 'Data not found.');
    }

    public function approveuser(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'link' => 'required|string|max:255',
            'link2' => 'required|string|max:255',
            'submission_token' => 'required|string',
        ]);

        // Check for the submission token
        if (Session::get('last_submission_token') !== $request->input('submission_token')) {
            // Store the token so it can't be reused
            Session::put('last_submission_token', $request->input('submission_token'));

            $data = individu::find($id);

            if ($data) {
                // Update the status
                $data->status = 'active';
                $data->save();

                // Set current and next year dates
                $currentYear = Carbon::now();
                $nextYear = Carbon::now()->addYear();

                // Create new sertifikatindividu entry
                $sertifikatindividu = sertifikatindividu::create([
                    'id_individu' => $data->id_user,
                    'tglmulai' => $currentYear->toDateString(),
                    'tglberakhir' => $nextYear->toDateString(),
                    'status' => "active",
                    'link' => $request->link,
                    'link2' => $request->link2,
                ]);

                // Send email notification
                $emailData = (object)[
                    'namadosen' => $data->namadosen,
                    'nidn' => $data->nidn,
                    'start_date' => $currentYear->format('d - m - Y'),
                    'end_date' => $nextYear->format('d - m - Y'),
                    'link' => $request->link,
                    'link2' => $request->link2,
                ];
                Mail::to($data->email)->send(new DosenApproved($emailData));

                return redirect()->back()->with('success', 'Status updated to active.');
            }

            return redirect()->back()->with('error', 'Data not found.');
        }

        return redirect()->back()->withErrors(['error' => 'Form has already been submitted.']);
    }
    
    public function disapproveuser($id)
    {
        $data = individu::find($id);
        
        if ($data) {
            $data->status = 'ditolak';
            $data->save();

            // Send email notification
            $emailData = (object)[
                'namadosen' => $data->namadosen, // assuming 'name' field exists
                'nidn' => $data->nidn,
            ];
            Mail::to($data->email)->send(new DosenDisapprove($emailData));

            
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
