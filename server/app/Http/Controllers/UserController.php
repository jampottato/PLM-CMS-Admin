<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash; // Added Hash Facade

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        $users = User::all();
        return response()->json(['users' => $users], 200);
    }

    public function show($id): JsonResponse
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json(['user' => $user], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'userType' => 'nullable|string',
            'name' => 'nullable|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'userType' => $validated['userType'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return response(['message' => 'User created successfully', 'user' => $user], 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'email' => 'sometimes|required|email|unique:users,email,' . $id,
            'password' => 'sometimes|required|min:7|confirmed',
            'userType' => 'nullable|string',
        ]);

        $user = User::findOrFail($id);

        $user->email = $validated['email'] ?? $user->email;
        $user->password = isset($validated['password']) ? Hash::make($validated['password']) : $user->password;
        $user->userType = $validated['userType'] ?? $user->userType;

        $user->save();

        return response(['message' => 'User updated successfully', 'user' => $user], 200);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response(['message' => 'User deleted successfully'], 204);
    }
}
    