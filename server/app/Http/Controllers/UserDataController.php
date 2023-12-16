<?php

namespace App\Http\Controllers;

use App\Models\UserData; // Make sure to import your UserData model

use Illuminate\Http\Request;

class UserDataController extends Controller
{
    public function index()
    {
        $newUserDatas = UserData::all(); // Fetch your user data here or as required

         return view('userdatas.index', compact('newUserDatas'));
    }

    public function create()
    {
        return view('userdatas.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'usertype' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:user_datas', // Change 'user_datas' to your table name
            'password' => 'required',
            'createdBy' => 'required',
            'description' => 'nullable',
        ]);

        $userData = UserData::create($validatedData);

        return redirect()->route('userData.index')
            ->with('success', 'UserData created successfully');
    }


    public function show(UserData $userData)
    {
        return view('userdatas.show', compact('userData'));
    }

    public function edit(UserData $userData)
    {
        return view('userdatas.edit', compact('userData'));
    }

    public function update(Request $request, UserData $userData)
    {
        $validatedData = $request->validate([
            'usertype' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:user_datas,email,' . $userData->id, // Change 'user_datas' to your table name
            'password' => 'required',
            'createdBy' => 'required',
            'description' => 'nullable',
        ]);

        $userData->update($validatedData);

        return redirect()->route('userdatas.index')
            ->with('success', 'UserData updated successfully');
    }

    public function destroy(UserData $userData)
    {
        $userData->delete();

        return redirect()->route('userdatas.index')
            ->with('success', 'UserData deleted successfully');
    }
}
