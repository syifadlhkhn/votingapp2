<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::all();
        return view('candidates.index', compact('candidates'));
    }

    public function create()
    {
        return view('candidates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:1000',
        ]);

        $candidate = new Candidate();
        $candidate->name = $request->name;
        $candidate->description = $request->description;
        $candidate->save();

        return redirect()->route('candidates.index')->with('success', 'Candidate created successfully.');
    }
}
