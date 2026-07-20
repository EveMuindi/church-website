<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::latest()->get();

        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        Member::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'ministry' => $request->ministry,
        ]);

        return redirect('/members')
            ->with('success', 'Member added successfully.');
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);

        return view('members.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        $member->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'ministry' => $request->ministry,
        ]);

        return redirect('/members')
            ->with('success', 'Member updated successfully.');
    }

    public function destroy($id)
    {
        Member::destroy($id);

        return redirect('/members')
            ->with('success', 'Member deleted successfully.');
    }
}