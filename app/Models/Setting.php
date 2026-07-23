<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'church_name',
        'church_email',
        'phone',
        'address',
        'facebook',
        'youtube',
        'tiktok',
        'paybill',
        'account_number',
    ];
}