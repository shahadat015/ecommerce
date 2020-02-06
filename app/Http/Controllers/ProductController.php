<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('website.product.index');
    }

    public function show($slug)
    { 
        $product = Product::where('slug', $slug)->firstOrFail();
        $product->load('categories', 'brand', 'attributes', 'options', 'metadata', 'images'); 
        return view('website.product.show', compact('product'));
    }

    public function productByCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $category->load('products');
        $products = $category->products()->with('categories', 'brand')->paginate(12);
        return view('website.product.index', compact('products'));
    }

    public function productByBrand($slug)
    {
        $brand = Brand::where('slug', $slug)->firstOrFail();
        $brand->load('products');
        $products = $brand->products()->with('categories', 'brand')->paginate(12);
        return view('website.product.index', compact('products'));
    }
}
