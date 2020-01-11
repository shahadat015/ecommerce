<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\AttributeSet;
use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductValidate;
use App\Option;
use App\Product;
use App\ProductAttribute;
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

    public function store(ProductValidate $request)
    {

        $request['status'] = (boolean)$request->status;
        $request['slug'] = str_slug($request->name);
        $product = Product::create($request->all());

        $product->categories()->attach($request->categories);
        $product->images()->attach($request->images);
        $product->metadata()->create([
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
        ]);

        if($request->attribute[0]['attribute_id']){
            $product->saveAttributes($request->attribute);
        }

        if($request->options[0]['name']){
            $product->saveOptions($request->options); 
        }

        if($product){
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
        // return $product->options;
        $categories = Category::all();
        $brands = Brand::all();
        $attributesets = AttributeSet::all();
        return view('admin.product.edit', compact('categories', 'brands', 'attributesets', 'product'));
    }

    public function update(ProductValidate $request, Product $product)
    {
        $request['status'] = (boolean)$request->status;
        $request['slug'] = str_slug($request->url);
        $product = $product->update($request->all());

        $product->categories()->sync($request->categories);
        $product->images()->sync($request->images);
        $product->metadata()->update([
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
        ]);

        if($request->attribute[0]['attribute_id']){
            $product->saveAttributes($request->attribute);
        }

        if($request->options[0]['name']){
            $product->saveOptions($request->options); 
        }

        if($product){
            return response()->json(['success' => 'Product successfully updated!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
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
