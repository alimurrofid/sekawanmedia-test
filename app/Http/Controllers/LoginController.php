<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    
    public function authenticate(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('name' => $input['name'], 'password' => $input['password']))) {
            $request->session()->regenerate();

            // Check the user's role
            if (auth()->user()->hasRole('admin')) {
                // Redirect to dashboard.home for admins
                Alert::toast('Selamat datang ' . auth()->user()->name, 'success');
                return redirect()->route('dashboard.home');
            } elseif (auth()->user()->hasRole('approver1') || auth()->user()->hasRole('approver2')) {
                // Redirect to approve-booking.index for approvers
                Alert::toast('Selamat datang ' . auth()->user()->name, 'success');
                return redirect()->route('approve-booking.index');
            }

            // In case of other roles, you can add more conditions as needed
            Alert::toast('Role tidak dikenali', 'error');
            return redirect()->route('login');
        }

        Alert::toast('Username atau password salah', 'error');
        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Alert::toast('Anda berhasil logout', 'success');
        return redirect()->route('login');
    }
}
