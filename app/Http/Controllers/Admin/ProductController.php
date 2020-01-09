<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\AttributeSet;
use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\Option;
use Freshbitsweb\Laratables\Laratables;
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

    public function products()
    {
        return Laratables::recordsOf(Product::class, function($query)
        {
            return $query->latest();
        });
    }

    public function index()
    {
        return view('admin.product.index');
    }

    public function create()
    {
        $categories = Category::where('category_id', null)->get();
        $brands = Brand::all();
        $attributesets = AttributeSet::all();
        return view('admin.product.create', compact('categories', 'brands', 'attributesets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'special_price' => 'nullable|numeric',
            'special_price_start' => 'nullable|required_with:special_price|date',
            'special_price_end' => 'nullable|required_with:special_price_start|date|after:special_price_start',
            'sku' => 'nullable|string|max:255',
            'qty' => 'required_if:manage_stock,1',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'short_description' => 'nullable|string',
            'new_from' => 'nullable|date',
            'new_to' => 'nullable|required_with:new_from|date|after:new_from',
        ]);

        // return $request;

        $request['status'] = (boolean) $request->status;
        $request['slug'] = str_slug($request->name);
        $product = Product::create($request->all());

        $product->categories()->attach($request->categories);
        $product->images()->attach($request->images);
        $product->metadata()->create([
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
        ]);

        // $productAttribute = $product->attributes()->create($request->attributes);
        // $productAttribute->values()->create($request->attributes);

        // $option = Option::create($request->options);
        // $option->values()->create($request->options);

        $create = 1;//$product->options()->attach($option);

        if($create){
            return response()->json(['success' => 'Product successfully created!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
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

    public function attributeValues(Attribute $attribute)
    {
        $values = $attribute->values;
        return view('admin.product.values', compact('values'));
    }
}
