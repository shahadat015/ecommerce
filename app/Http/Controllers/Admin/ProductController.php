<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Create Product')->only(['create', 'store']);
        $this->middleware('permission:View Product')->only(['index', 'show']);
        $this->middleware('permission:Update Product')->only(['edit', 'update']);
        $this->middleware('permission:Delete Product')->only(['destroy', 'delete']);
    }

    public function index()
    {
        return view('admin.product.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Product $product)
    {
        return view('admin.product.show');
    }


    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
