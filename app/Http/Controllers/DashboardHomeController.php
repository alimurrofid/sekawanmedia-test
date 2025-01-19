<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardHomeController extends Controller
{
    public function index()
    {
        return view('dashboard.home');
    }
}
