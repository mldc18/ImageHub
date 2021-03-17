<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PasswordExpiredRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ExpiredPasswordController extends Controller
{
    public function expired()
    {
        $user = Auth::user();
        $password_changed_at = new Carbon(($user->password_changed_at) ? $user->password_changed_at : $user->created_at);
        if (Carbon::now()->diffInDays($password_changed_at) >= config('auth.password_expires_days')) {
            return view('auth.passwords.expired')->with(['status' => null]);
        }
        return redirect()->back();
    }

    public function postExpired(PasswordExpiredRequest $request)
    {
        // Checking current password
        if (!Hash::check($request->current_password, $request->user()->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is not correct']);
        }

        $request->user()->update([
            'password' => bcrypt($request->password),
            'password_changed_at' => Carbon::now()->toDateTimeString()
        ]);
        return view('auth.passwords.expired')->with(['status' => 'Password changed successfully']);
    }
}
