<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CustomAdminViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function __invoke(Request $request)
    {
        $roleid = ['role', Auth::user()->role == 1];
        dd($roleid);
    
        return view('layouts.navigation', compact('roleid'));
    }
}
