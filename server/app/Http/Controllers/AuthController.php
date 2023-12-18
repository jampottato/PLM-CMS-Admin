<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Dcblogdev\MsGraph\Facades\MsGraph;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function connect()
    {
        return MsGraph::connect();
    }

    public function logout()
    {
        return MsGraph::disconnect();
    }

    // public function route(Request $request)
    // {
    //     return Redirect::away('http://localhost:5173');
    // }
}
    

