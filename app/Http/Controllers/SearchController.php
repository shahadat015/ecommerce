<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'LIKE', "%$query%")
        					->orWhere('price', 'LIKE', "%$query%")
        					->orWhere('short_description', 'LIKE', "%$query%")
        					->orWhere('description', 'LIKE', "%$query%")->paginate(10);

        return view('website.product.index', compact('products'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'LIKE', "%$query%")
                            ->orWhere('price', 'LIKE', "%$query%")
                            ->orWhere('short_description', 'LIKE', "%$query%")
                            ->limit(7)->get();

        return view('website.partial.searchbox', compact('products'));
    }

}
