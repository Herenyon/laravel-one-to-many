<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portf;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index()
    {
        $portf = Portf::all();
        return view('admin.dashboard', compact('portf'));
    }
}
