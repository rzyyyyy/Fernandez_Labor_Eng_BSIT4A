<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', ['categories' => \App\Models\Category::latest()->get()]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $data = $request->validate(['name' => ['required','string','max:255','unique:categories,name']]);
        \App\Models\Category::create($data);
        return back()->with('success','Category created.');
    }
}
