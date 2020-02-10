<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'LIKE', "%$query%")
        					->orWhere('price', 'LIKE', "%$query%")
        					->orWhere('short_description', 'LIKE', "%$query%")
        					->orWhere('description', 'LIKE', "%$query%")->paginate(10);

        return view('website.product.index', compact('products'));
    }

    public function searchProduct(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'LIKE', "%$query%")
        					->orWhere('price', 'LIKE', "%$query%")
        					->orWhere('short_description', 'LIKE', "%$query%")
        					->orWhere('description', 'LIKE', "%$query%")->limit(6)->get();

        return view('website.partial.searchbox', compact('products'));
    }

}
