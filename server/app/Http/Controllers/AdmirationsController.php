<?php

namespace App\Http\Controllers;

use App\Models\Admirations;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AdmirationsController extends Controller
{
    public function index(): JsonResponse
    {
        $admirations = Admirations::all();
        return response()->json(['admirations' => $admirations], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'office' => 'required|string',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'createdBy' => 'nullable|string',
        ]);

        $admirations = Admirations::create([
            'office' => $request->input('office'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'createdBy' => $request->input('createdBy'),
        ]);

        return response()->json(['admirations' => $admirations], 201);
    }

    public function show($id): JsonResponse
    {
        $admirations = Admirations::findOrFail($id);
        return response()->json(['admirations' => $admirations], 200);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $request->validate([
            'office' => 'required|string',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'createdBy' => 'nullable|string',
        ]);

        $admirations = Admirations::findOrFail($id);
        $admirations->update([
            'office' => $request->input('office'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'createdBy' => $request->input('createdBy'),
        ]);

        return response()->json(['admirations' => $admirations], 200);
    }

    public function destroy($id): JsonResponse
    {
        $admirations = Admirations::findOrFail($id);
        $admirations->delete();
        return response()->json(null, 204);
    }
}