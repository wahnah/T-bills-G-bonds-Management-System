<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resold;
use Illuminate\Http\Request;

class Resells extends Controller
{
    public function index()
    {
        $resolds = Resold::all();
        return view('admin.resolds.index', compact('resolds'));
    }
}
