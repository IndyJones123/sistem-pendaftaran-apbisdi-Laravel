<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\pt;
use App\Models\individu;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $ptData = pt::where('status', 'active')->get();
        return view('auth.register', compact('ptData'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $currentDate = Carbon::now()->toDateString();

        if($request->usertype == "pt")
        {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'usertype' => ['required', 'string', 'max:255'],
                'namapt' => ['required', 'string', 'max:255'],
                'kodept' => ['required', 'string', 'max:255'],
                'alamat' => ['required', 'string', 'max:255'],
                'nidn' => ['required', 'string', 'max:255'],
                'namapengelola' => ['required', 'string', 'max:255'],
                'telp' => ['required', 'string'],
                'berkas1' => ['required', 'file', 'mimes:jpg,png,pdf'], // Adjust MIME types as needed
                'berkas2' => ['required', 'file', 'mimes:jpg,png,pdf'], // Adjust MIME types as needed
            ]);
    
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'usertype' => $request->usertype,
                'password' => Hash::make($request->password),
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

            $pt = pt::create([
                'namapt' => $request->namapt,
                'email' => $request->email,
                'kodept' => $request->kodept,
                'alamat' => $request->alamat,
                'nidn' => $request->nidn,
                'namapengelola' => $request->namapengelola,
                'telp' => $request->telp,
                'namakaprodi' => $request->name,
                'tgldaftar' => $currentDate,
                'id_biaya' => 1,
                'id_user' => $user->id,
                'status' => "pending",
                'berkas1' => $berkas1,
                'berkas2' => $berkas2,
            ]);
            

        }
        if($request->usertype == "user")
        {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'usertype' => ['required', 'string', 'max:255'],
                'id_pt' => ['required', 'integer', 'max:255'],
                'nidn' => ['required', 'string', 'max:255'],
                'telp' => ['required', 'string'], //notelp
                'dokumen1' => ['required', 'file', 'mimes:jpg,png,pdf'], // Adjust MIME types as needed
                'dokumen2' => ['required', 'file', 'mimes:jpg,png,pdf'], // Adjust MIME types as needed
            ]);
    
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'usertype' => $request->usertype,
                'password' => Hash::make($request->password),
            ]);

            if($request->hasFile('dokumen1'))
            {
                $dokumen1Name = Str::random(10) . '.' . $request->file('dokumen1')->getClientOriginalExtension();
                $request->file('dokumen1')->move('data/',$dokumen1Name);
                $dokumen1 = $dokumen1Name;
            }
            if($request->hasFile('dokumen2'))
            {
                $dokumen2Name = Str::random(10) . '.' . $request->file('dokumen2')->getClientOriginalExtension();
                $request->file('dokumen2')->move('data/',$dokumen2Name);
                $dokumen2 = $dokumen2Name;
            }

            $individu = individu::create([
                'namadosen' => $request->name,
                'email' => $request->email,
                'nidn' => $request->nidn,
                'notelp' => $request->telp,
                'tgldaftar' => $currentDate,
                'id_biaya' => 2,
                'id_user' => $user->id,
                'id_pt' => $request->id_pt,
                'status' => "pending",
                'dokumen1' => $dokumen1,
                'dokumen2' => $dokumen2,
            ]);
        }

        event(new Registered($user));
        Auth::login($user);

        if($request->usertype == "pt")
        {
            return redirect(route('pt/statuspt', absolute: false));
        }
        elseif($request->usertype == "user")
        {
            return redirect(route('user/dashboard', absolute: false));
        }
        else
        {
            return redirect(route('/', absolute: false));
        }
    }
}
