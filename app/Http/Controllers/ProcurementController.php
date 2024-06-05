<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Procurement;

class ProcurementController extends Controller
{
    public function index()
    {
        $procurements = Procurement::paginate(10); // Adjust the number to your preference
        return view('procurements.index', compact('procurements'));
    }

    public function show($id)
    {
        $procurement = Procurement::findOrFail($id);
        return view('procurements.show', compact('procurement'));
    }


    public function update(Request $request, Procurement $procurement)
    {
        $request->validate([
            'code' => 'required|string|max:255',
            'project' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'end_user' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'source_funds' => 'nullable|string|max:255',
            'remarks' => 'nullable|string|max:255',
        ]);

        $procurement->update($request->all());

        return redirect()->route('procurements.index')
            ->with('success', 'Procurement updated successfully.');
    }

    public function edit(Procurement $procurement)
    {
        return view('procurements.edit', compact('procurement'));
    }

    public function create()
    {
        return view('procurements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:255',
            'project' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'end_user' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'source_funds' => 'nullable|string|max:255',
            'remarks' => 'nullable|string|max:255',
            'procurement_project' => 'nullable|string|max:255',
        ]);

        Procurement::create($request->all());

        return redirect()->route('procurements.index')
                         ->with('success', 'Procurement created successfully.');
    }
}