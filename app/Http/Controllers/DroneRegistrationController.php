<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\DroneRegistration;
use Illuminate\Http\Request;

class DroneRegistrationController extends Controller
{

    public function index()
    {
        return view('drone-registration');
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
            // 'ct26' => ['required'],
            // 'ct30' => ['required'],
            // 'certificate' => ['required'],
            // 'personal_information_form' => ['required'],
            // 'request_for_registration' => ['required'],
            // 'drone_photography' => ['required'],
            // 'remote_photo' => ['required'],
            // 'photo_serial_number' => ['required'],
            // 'nbtc_documents' => ['required'],
            // 'caa_documents' => ['required'],
            // 'other_documents' => ['required'],
        ]);
    }

    protected function create(array $data)
    {

        if (isset($data['ct26'])) {
            $ct26 = $data['ct26']->store('drone_registrations', 'public');
        } else {
            $ct26 = null;
        }
        if (isset($data['ct30'])) {
            $ct30 = $data['ct30']->store('drone_registrations', 'public');
        } else {
            $ct30 = null;
        }
        if (isset($data['certificate'])) {
            $certificate = $data['certificate']->store('drone_registrations', 'public');
        } else {
            $certificate = null;
        }
        if (isset($data['personal_information_form'])) {
            $personal_information_form = $data['personal_information_form']->store('drone_registrations', 'public');
        } else {
            $personal_information_form = null;
        }
        if (isset($data['request_for_registration'])) {
            $request_for_registration = $data['request_for_registration']->store('drone_registrations', 'public');
        } else {
            $request_for_registration = null;
        }
        if (isset($data['drone_photography'])) {
            $drone_photography = $data['drone_photography']->store('drone_registrations', 'public');
        } else {
            $drone_photography = null;
        }
        if (isset($data['remote_photo'])) {
            $remote_photo = $data['remote_photo']->store('drone_registrations', 'public');
        } else {
            $remote_photo = null;
        }
        if (isset($data['photo_serial_number'])) {
            $photo_serial_number = $data['photo_serial_number']->store('drone_registrations', 'public');
        } else {
            $photo_serial_number = null;
        }
        if (isset($data['nbtc_documents'])) {
            $nbtc_documents = $data['nbtc_documents']->store('drone_registrations', 'public');
        } else {
            $nbtc_documents = null;
        }
        if (isset($data['caa_documents'])) {
            $caa_documents = $data['caa_documents']->store('drone_registrations', 'public');
        } else {
            $caa_documents = null;
        }
        if (isset($data['other_documents'])) {
            $other_documents = $data['other_documents']->store('drone_registrations', 'public');
        } else {
            $other_documents = null;
        }


        return DroneRegistration::create([
            'ct26' => $ct26,
            'ct30' => $ct30,
            'certificate' => $certificate,
            'personal_information_form' => $personal_information_form,
            'request_for_registration' => $request_for_registration,
            'drone_photography' => $drone_photography,
            'remote_photo' => $remote_photo,
            'photo_serial_number' => $photo_serial_number,
            'nbtc_documents' => $nbtc_documents,
            'caa_documents' => $caa_documents,
            'other_documents' => $other_documents,
        ]);
    }
}
