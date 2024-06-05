<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $suppliers = Supplier::paginate(10); // Adjust the pagination as needed
        if ($request->ajax()) {
            return view('suppliers.partials.supplier_table', compact('suppliers'))->render();
        }
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_number' => 'required|string|max:15',
            'representative_name' => 'required|string|max:255',
            'representative_contact_number' => 'required|string|max:15',
            'representative_email' => 'required|email|max:255',
        ]);

        // Create a new supplier
        Supplier::create($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Supplier added successfully');
    }

    public function show($id)
    {
        $supplier = Supplier::find($id);
        return view('suppliers.supplier_details', compact('supplier'));
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_number' => 'required|string|max:15',
            'representative_name' => 'required|string|max:255',
            'representative_contact_number' => 'required|string|max:15',
            'representative_email' => 'required|email|max:255',
        ]);

        // Update the supplier
        Supplier::find($id)->update($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully');
    }

    public function destroy($id)
    {
        // Delete the supplier
        Supplier::find($id)->delete();
        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully');
    }

    public function showDetails($id)
    {
        $supplier = Supplier::find($id);
        return view('supplier_details', compact('supplier'));
    }
}
