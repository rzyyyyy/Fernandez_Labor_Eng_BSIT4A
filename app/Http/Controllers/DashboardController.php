<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'userCount' => User::count(),
            'productCount' => Product::count(),
            'categoryCount' => Category::count(),
        ]);
    }
}
