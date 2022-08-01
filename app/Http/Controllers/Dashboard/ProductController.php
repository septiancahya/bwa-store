<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\ProductGallery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['galleries', 'category'])->where('users_id', Auth::user()->id)->get();
        return view('pages.dashboard.product', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.dashboard.product-create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $product = Product::create($data);

        $gallery = [
            'products_id' => $product->id,
            'photo' => $request->file('photo')->store('assets/product', 'public'),
        ];
        ProductGallery::create($gallery);

        return redirect()->route('dashboard-product');
    }
    
    public function detail($id)
    {
        $product = Product::with(['galleries', 'user', 'category'])->findOrFail($id);
        $categories = Category::all();
        return view('pages.dashboard.product-detail', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function update(ProductRequest $request)
    {
        $id = $request->id;
        $data = $request->all();
        $product = Product::findOrfail($id);
        $data['slug'] = Str::slug($request->name);
        $product->update($data);

        return redirect()->route('dashboard-product-detail', $product->id);
    }

    public function upload(Request $request)
    {   
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store('assets/product', 'public');

        ProductGallery::create($data);

        return redirect()->route('dashboard-product-detail', $request->products_id);
    }

    public function delete($id)
    {
        $data = ProductGallery::findOrFail($id);
        $data->delete($data);

        return redirect()->route('dashboard-product-detail', $data->products_id);
    }
}
