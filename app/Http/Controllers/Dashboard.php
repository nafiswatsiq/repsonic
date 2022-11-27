<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Dashboard extends Controller
{
    public function index()
    {
        return view('livewire.dashboard.index');
    }

    public function profile()
    {
        return view('livewire.dashboard.profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required',
            'password' => ['required', 'min:8', 'same:confirmpass'],
        ]);

        $user =Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->save();

        if($request->hasFile('avatar') && $request->file('avatar')->isValid()){
            $user = User::where('id', auth()->user()->id)->first();
            $user->clearMediaCollection('avatar');
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }
        
        toast('Profile Update Successfully!','success');
        return back();
    }
}
