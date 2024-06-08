<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SiteUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $this->create($request->all());

        return redirect()->intended('home');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:site_users'],
            'address' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'district' => ['required', 'string', 'max:255'],
            'sub_district' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:255'],
            'accept_announcement' => ['required', 'boolean'],
        ]);
    }

    protected function create(array $data)
    {
        $profileImagePath = null;

        if (isset($data['profile_image'])) {
            $profileImagePath = $data['profile_image']->store('profile_images', 'public');
        }

        $user = SiteUser::where('phone', $data['phone'])->first();

        if ($user) {
            $user->name = $data['name'];
            // $user->phone = $data['phone'];
            if (isset($data['password'])) {
                $user->password = Hash::make($data['password']);
            }
            $user->profile_image = $profileImagePath;
            $user->firstname = $data['firstname'];
            $user->lastname = $data['lastname'];
            $user->email = $data['email'];
            $user->address = $data['address'];
            $user->province = $data['province'];
            $user->district = $data['district'];
            $user->sub_district = $data['sub_district'];
            $user->postal_code = $data['postal_code'];
            $user->accept_announcement = $data['accept_announcement'];
            $user->role = 'customer';
            $user->dealer = null;
            $user->save();
        } else {
            SiteUser::create([
                'name' => $data['name'],
                // 'phone' => $data['phone'],
                'password' => Hash::make($data['password']),
                'profile_image' => $profileImagePath,
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'address' => $data['address'],
                'province' => $data['province'],
                'district' => $data['district'],
                'sub_district' => $data['sub_district'],
                'postal_code' => $data['postal_code'],
                'accept_announcement' => $data['accept_announcement'],
                'role' => 'customer',
                'dealer' => null,
            ]);
        }
    }
}
