<?php

namespace App\Http\Controllers;

use Database\Seeders\CategorySeeder;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function show(): View
    {
        $categories = Category::where('user_id', Auth::id())
            ->get();

        return view('categories.index', ['categories' => $categories]);
    }
}
