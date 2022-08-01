<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoryController extends Controller
{
   /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::paginate(32);
        return view('pages.categories', compact('categories', 'products'));
    }

    public function detail($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $products = Product::where('categories_id', $category->id)->get();
        return view('pages.categories-detail', compact('products', 'category'));
    }
}
