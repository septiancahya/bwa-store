<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;
use App\Cart;

class DetailController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $slug)
    {
        $product = Product::with('galleries')->where('slug', $slug)->firstOrFail();
        return view('pages.detail', compact('product'));
    }

    public function add($id)
    {
        $data['products_id'] = $id;
        $data['users_id'] = Auth::user()->id;

        Cart::create($data);

        return redirect()->route('cart');
    }
}
