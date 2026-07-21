<?php

namespace App\Http\Controllers;

use App\Models\Sermon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SermonController extends Controller
{
    public function index()
    {
        $sermons = Sermon::latest()->get();

        return view('sermons.index', compact('sermons'));
    }

    public function create()
    {
        return view('sermons.create');
    }

    public function store(Request $request)
    {
        $file = null;

        if ($request->hasFile('file')) {
            $file = $request->file('file')->store('sermons', 'public');
        }

        Sermon::create([
            'title' => $request->title,
            'preacher' => $request->preacher,
            'sermon_date' => $request->sermon_date,
            'file' => $file,
        ]);

        return redirect('/sermons')
            ->with('success', 'Sermon added successfully.');
    }

    public function edit($id)
    {
        $sermon = Sermon::findOrFail($id);

        return view('sermons.edit', compact('sermon'));
    }

    public function update(Request $request, $id)
    {
        $sermon = Sermon::findOrFail($id);

        if ($request->hasFile('file')) {

            if ($sermon->file) {
                Storage::disk('public')->delete($sermon->file);
            }

            $sermon->file = $request->file('file')->store('sermons', 'public');
        }

        $sermon->update([
            'title' => $request->title,
            'preacher' => $request->preacher,
            'sermon_date' => $request->sermon_date,
            'file' => $sermon->file,
        ]);

        return redirect('/sermons');
    }

    public function destroy($id)
    {
        $sermon = Sermon::findOrFail($id);

        if ($sermon->file) {
            Storage::disk('public')->delete($sermon->file);
        }

        $sermon->delete();

        return back();
    }
}