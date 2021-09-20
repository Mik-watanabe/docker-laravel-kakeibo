<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Database\Seeders\CategorySeeder;;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
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

    public function store(CategoryRequest $request):RedirectResponse
    {
        $validated = $request->validated();
        $category = new Category();
        $category->user_id = Auth::id();
        $category->name = $validated['category'];
        $category->save();

        return redirect()->route('category');
    }
}
