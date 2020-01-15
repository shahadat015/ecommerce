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
            return $query->latest('id');
        });
    }

    public function index()
    {
        return view('admin.product.index');
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $attributesets = AttributeSet::all();
        $options = Option::where('is_global', 1)->get();
        return view('admin.product.create', compact('categories', 'brands', 'attributesets', 'options'));
    }

    public function store(ProductValidate $request)
    {
        // return $request;

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
        $product->load('categories', 'brand', 'attributes', 'options', 'metadata', 'images', 'image');
        return view('admin.product.show', compact('product'));
    }


    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $attributesets = AttributeSet::all();
        $options = Option::where('is_global', 1)->get();
        $product->load('categories', 'brand', 'attributes', 'options', 'metadata', 'images', 'image');
        return view('admin.product.edit', compact('categories', 'brands', 'attributesets', 'options', 'product'));
    }

    public function update(ProductValidate $request, Product $product)
    {

        $request['status'] = (boolean)$request->status;
        $request['slug'] = str_slug($request->url);
        $product->update($request->all());
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

    public function destroy(Request $request)
    {
        $delete = Product::findOrFail($request->id)->each(function ($product){
            $product->images()->detach();
            $product->delete();  
        });

        if($delete){
            return response()->json(['success' => 'Product successfully deleted!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }

    public function attributeValues(Attribute $attribute)
    {
        $values = $attribute->values;
        return view('admin.product.values', compact('values'));
    }
    public function optionValues(Option $option)
    {
        return view('admin.product.options', compact('option'));
    }
}
