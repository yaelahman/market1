<?php

namespace App\Http\Controllers;

use App\License;
use App\LogRequestLicense;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }

    public function profile()
    {
        $user = Auth::user();

        $data = [
            'user' => $user
        ];

        return view('auth.profile', $data);
        // 
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }

        if ($user->save()) {
            $request->session()->flash('alert', 'success');
            $request->session()->flash('message', 'Profile updated successfully');

            return redirect()->to(route('profile.index'));
        }
    }
}
