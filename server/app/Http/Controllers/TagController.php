<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

use Illuminate\Http\JsonResponse;

class TagController extends Controller
{
    public function index(): JsonResponse
    {
        $tags = Tag::all();
        return response()->json(['tags' => $tags], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'tagName' => 'required|string|unique:tags',
            'createdBy' => 'nullable|string',
        ]);

        $tag = Tag::create([
            'tagName' => $request->input('tagName'),
            'createdBy' => $request->input('createdBy'),
        ]);

        return response()->json(['tag' => $tag], 201);
    }

    public function show($id): JsonResponse
    {
        $tag = Tag::findOrFail($id);
        return response()->json(['tag' => $tag], 200);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $request->validate([
            'tagName' => 'required|string|unique:tags,tagName,' . $id,
            'createdBy' => 'nullable|string',
        ]);

        $tag = Tag::findOrFail($id);
        $tag->update([
            'tagName' => $request->input('tagName'),
            'createdBy' => $request->input('createdBy'),
        ]);

        return response()->json(['tag' => $tag], 200);
    }

    public function destroy($id): JsonResponse
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return response()->json(null, 204);
    }
}
