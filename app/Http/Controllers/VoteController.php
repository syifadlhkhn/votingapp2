<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function index()
    {
        // Fetch all candidates
        $candidates = Candidate::all();

        return view('votes.index', compact('candidates'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'candidate_id' => 'required|exists:candidates,id',
        ]);

        // Find the candidate by ID
        $candidate = Candidate::findOrFail($request->candidate_id);

        // Increment the vote_count column
        $candidate->increment('vote_count');

        // Optionally, you can also log the vote in a separate Vote model if needed
        // Vote::create(['candidate_id' => $request->candidate_id]);

        return redirect()->back()->with('success', 'Vote counted successfully.');
    }

    public function results()
    {
        // Fetch candidates with vote counts
        $candidates = Candidate::withCount('votes')->get();

        return view('votes.results', compact('candidates'));
    }
}
