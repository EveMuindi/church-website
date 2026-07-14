<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::latest()->get();

        return view('announcements.index', compact('announcements'));
    }

    public function create()
    {
        return view('announcements.create');
    }

    public function store(Request $request)
    {
        Announcement::create([
            'title' => $request->title,
            'content' => $request->content,
            'announcement_date' => $request->announcement_date,
        ]);

        return redirect('/announcements')
            ->with('success', 'Announcement added successfully.');
    }
}