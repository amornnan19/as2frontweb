<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PhoneOtpVerification extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number',
        'otp',
        'expires_at',
    ];

    public $timestamps = false; // Since we are not using Laravel's created_at and updated_at columns

    // Optionally, you can define the table name if it doesn't follow Laravel's naming convention
    protected $table = 'phone_otp_verifications';

    // Accessor to format expires_at if needed
    public function getExpiresAtAttribute($value)
    {
        return Carbon::parse($value)->toDateTimeString();
    }
}
