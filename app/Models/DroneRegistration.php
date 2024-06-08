<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DroneRegistration extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'ct30',
        'certificate',
        'personal_information_form',
        'request_for_registration',
        'drone_photography',
        'remote_photo',
        'photo_serial_number',
        'nbtc_documents',
        'caa_documents',
        'other_documents',
    ];
}
