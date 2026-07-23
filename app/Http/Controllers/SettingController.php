<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::first();

        if (!$setting) {
            $setting = Setting::create([
                'church_name' => 'AIC SHILOH',
            ]);
        }

        return view('settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();

        $setting->update([
            'church_name'   => $request->church_name,
            'church_email'  => $request->church_email,
            'phone'         => $request->phone,
            'address'       => $request->address,
            'facebook'      => $request->facebook,
            'youtube'       => $request->youtube,
            'tiktok'        => $request->tiktok,
            'paybill'       => $request->paybill,
            'account_number'=> $request->account_number,
        ]);

        return back()->with('success', 'Settings updated successfully.');
    }
}