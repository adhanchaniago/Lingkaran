<?php

namespace App\Http\Controllers\GuestUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Writer');
    }
    
    public function index()
    {
        return view('guest.dashboard.index');
    }
}
