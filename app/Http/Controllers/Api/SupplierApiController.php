<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SupplierApiController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return response()->json($suppliers);
    }

    public function show(Supplier $supplier)
    {
        return response()->json($supplier);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|string|max:15',
        ]);

        $supplier = Supplier::create($request->all());
        return response()->json($supplier, Response::HTTP_CREATED);
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|string|max:15',
        ]);

        $supplier->update($request->all());
        return response()->json($supplier);
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
