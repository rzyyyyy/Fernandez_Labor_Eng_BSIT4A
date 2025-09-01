<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use App\Models\Product;
use App\Models\Category;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard',[
            'userCount' => User::count(),
            'productCount' => Product::count(),
            'categoryCount' => Category::count(),
        ]);
    }
}
