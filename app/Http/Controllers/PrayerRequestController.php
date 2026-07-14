<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrayerRequest;

class PrayerRequestController extends Controller
{
    public function store(Request $request)
    {
        PrayerRequest::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'prayer_request' => $request->prayer_request,
        ]);

        return back()->with('success', 'Your prayer request has been submitted successfully.');
    }

    public function show($id)
    {
        $prayer = PrayerRequest::findOrFail($id);

        return view('show-prayer', compact('prayer'));
    }

    public function destroy($id)
    {
        $prayer = PrayerRequest::findOrFail($id);

        $prayer->delete();

        return redirect('/admin')->with('success', 'Prayer request deleted successfully.');
    }

    public function edit($id)
    {
        $prayer = PrayerRequest::findOrFail($id);

        return view('edit-prayer', compact('prayer'));
    }
    public function update(Request $request, $id)
{
    $prayer = PrayerRequest::findOrFail($id);

    $prayer->update([
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        'prayer_request' => $request->prayer_request,
    ]);

    return redirect('/admin')->with('success', 'Prayer request updated successfully.');
}
}