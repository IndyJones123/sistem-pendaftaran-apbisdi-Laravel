<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


use App\Models\individu;
use App\Models\pt;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        if($request->user()->usertype == "pt")
        {
            $Data = pt::where('id_user', $request->user()->id)->first();
        }
        elseif($request->user()->usertype == "user")
        {
            $Data = individu::where('id_user', $request->user()->id)->first();
        }
        

        return view('profile.edit', [
            'user' => $request->user(),
            'Data' => $Data,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if($request->user()->usertype == "pt")
        {
            $ptData = Pt::where('id_user', $request->user()->id)->first();

            // Validate the request data
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'telp' => 'required|string|max:15',
                'kodept' => 'required|string|max:50',
                'nidn' => 'required|string|max:10',
                'namapengelola' => 'required|string|max:255',
                'namakaprodi' => 'required|string|max:255',
            ]);
    
            $ptData->update([
                'namapt' => $request->input('name'),
                'email' => $request->input('email'),
                'telp' => $request->input('telp'),
                'kodept' => $request->input('kodept'),
                'nidn' => $request->input('nidn'),
                'namapengelola' => $request->input('namapengelola'),
                'namakaprodi' => $request->input('namakaprodi'),
            ]);
        }

        if($request->user()->usertype == "user")
        {
            $userData = individu::where('id_user', $request->user()->id)->first();

            // Validate the request data
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'telp' => 'required|string|max:15',
                'nidn' => 'required|string|max:10',
            ]);
    
            $userData->update([
                'namadosen' => $request->input('name'),
                'email' => $request->input('email'),
                'notelp' => $request->input('telp'),
                'nidn' => $request->input('nidn'),
            ]);
        }
        

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
