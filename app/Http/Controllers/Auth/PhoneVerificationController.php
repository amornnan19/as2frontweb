<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PhoneOtpVerification;
use App\Models\SiteUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PhoneVerificationController extends Controller
{
    public function index()
    {
        return view('auth.request-otp');
    }

    public function verify()
    {
        return view('auth.verify-otp');
    }


    public function requestOtp(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|digits:10',
        ]);

        $phone_number = $request->phone_number;
        $otp = rand(100000, 999999);

        PhoneOtpVerification::updateOrCreate(
            ['phone_number' => $phone_number],
            [
                'otp' => $otp,
                'expires_at' => Carbon::now()->addMinutes(5)
            ]
        );

        return redirect()->back()->withInput()->with('phone_number', $phone_number);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|digits:10',
            'otp' => 'required|digits:6',
        ]);

        $phone_number = $request->phone_number;
        $otp = $request->otp;

        $verification = PhoneOtpVerification::where('phone_number', $phone_number)
            ->where('otp', $otp)
            ->where('expires_at', '>=', Carbon::now())
            ->first();

        if (!$verification) {
            return response()->json(['message' => 'Invalid OTP or OTP expired.'], 401);
        }

        // Log in the user or create a new user if not exists
        $user = SiteUser::firstOrCreate(['phone' => $phone_number]);

        Auth::login($user);

        // Delete the OTP record after successful verification
        $verification->delete();

        return redirect()->intended('/register');
    }
}
