<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PhoneOtpVerification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PhoneVerificationController extends Controller
{
    public function requestOtp(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|digits:10',
        ]);

        $phone_number = $request->phone_number;
        $otp = rand(100000, 999999); // Generate a 6-digit OTP

        PhoneOtpVerification::updateOrCreate(
            ['phone_number' => $phone_number],
            [
                'otp' => $otp,
                'expires_at' => Carbon::now()->addMinutes(5)
            ]
        );

        // Send OTP via SMS (using a service like Twilio, Nexmo, etc.)
        // Example: Twilio::message($phone_number, "Your OTP is $otp");

        return response()->json(['message' => 'OTP sent successfully.']);
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
        $user = User::firstOrCreate(['phone' => $phone_number]);

        Auth::login($user);

        // Delete the OTP record after successful verification
        $verification->delete();

        return response()->json(['message' => 'Logged in successfully.', 'user' => $user]);
    }
}
