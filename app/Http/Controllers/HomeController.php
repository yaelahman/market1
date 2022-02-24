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
        $license = License::all();
        foreach ($license as $row) {
            $update = License::find($row->id);
            if (strtotime(date('Y-m-d', strtotime($row->duration))) < strtotime(date('Y-m-d'))) {
                $update->status = 0;
                $update->save();
            }
        }
        $license = License::count();
        $dailyRequest = LogRequestLicense::where('created_at', 'ILIKE', '%' . date('Y-m-d') . '%')->count();

        $data = [
            'license_count' => $license,
            'request_count' => $dailyRequest
        ];

        return view('home', $data);
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
