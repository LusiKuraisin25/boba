<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function index()
    {
        return view('profile', [
            'title' => 'Profile',
            'order' => Pesanan::where('id_user', auth()->user()->id)->get()
        ]);
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('edit-profile', [
            'title' => 'Edit Profile',
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $user = $request->user();

        $user->fill($request->validated());
    
        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::delete($user->image);
            }
    
            $imagePath = $request->file('image')->store('public/profile_images');
            $request->user()->image = $imagePath;
        }

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->no_telepon = $request->no_telepon;
        $request->user()->alamat = $request->alamat;
        $request->user()->gender = $request->gender;
        $request->user()->tanggal_lahir = $request->tanggal_lahir;

        $request->user()->save();

        return redirect('/profile')->with('status', 'profile-updated');
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
