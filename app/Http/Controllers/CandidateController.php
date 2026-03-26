<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateController extends Controller
{
    // display + list & search
    public function index(Request $request)
    {
        $search = $request->search;

        $candidates = Candidate::when($search, function ($query, $search) {
            return $query->where('first_name', 'like', "%$search%")
                ->orWhere('middle_name', 'like', "%$search%")
                ->orWhere('last_name', 'like', "%$search%")
                ->orWhere('position', 'like', "%$search%")
                ->orWhere('party', 'like', "%$search%");
        })->get();

        return view('index', compact('candidates', 'search'));
    }

    // save data
    public function store(Request $request)
    {
        Candidate::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'address' => $request->address,
            'position' => $request->position,
            'party' => $request->party
            // 'first_name', 'middle_name', 'last_name', 'gender', 'address', 'position', 'party'
        ]);
        return redirect('/candidates');
    }

    // Show edit form
    public function edit($id)
    {
        $candidate = Candidate::findOrFail($id);
        return view('edit', compact('candidate'));
    }

    // Update candidate
    public function update(Request $request, $id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'address' => $request->address,
            'position' => $request->position,
            'party' => $request->party
        ]);
        return redirect('/candidates');
    }

    // Delete candidate
    public function destroy($id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->delete();
        return redirect('/candidates');
    }
}
