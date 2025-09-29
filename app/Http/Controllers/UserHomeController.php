<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class UserHomeController extends Controller
{
    public function show(Request $request): View
    {
        $user = $request->user();
        
        return view('user.home', compact('user'));
    }
}
