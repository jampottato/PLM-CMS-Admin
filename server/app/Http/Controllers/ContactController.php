<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    public function index(): JsonResponse
    {
        $contacts = Contact::all();
        return response()->json(['contacts' => $contacts], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'office' => 'required|string',
            'contactDetails' => 'required|string|unique:contacts,contactdetails,null,null,office,'.$request->input('office').',createdBy,'.$request->input('createdBy'),
            'createdBy' => 'nullable|string',
        ]);

        $contact = Contact::create($validatedData);

        return response()->json(['contact' => $contact], 201);
    }

    public function show($id): JsonResponse
    {
        $contact = Contact::findOrFail($id);
        return response()->json(['contact' => $contact], 200);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $validatedData = $request->validate([
            'office' => 'required|string',
            'contactDetails' => 'required|email|unique:contacts,contactdetails,NULL,NULL,office,' . $request->input('office') . ',createdBy,' . $request->input('createdBy'),
            'createdBy' => 'nullable|string',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($validatedData);

        return response()->json(['contact' => $contact], 200);
    }

    public function destroy($id): JsonResponse
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return response()->json(null, 204);
    }
}
