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
use Illuminate\Support\Facades\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

    public function getProducts()
    {
        return response()->json( Product::all());
    }

    public function index()
    {
        return view('admin.product.index');
    }

    public function create()
    {
        $categories = Category::treeList();
        $brands = Brand::all();
        $attributesets = AttributeSet::all();
        $options = Option::where('is_global', 1)->get();
        
        return view('admin.product.create', compact('categories', 'brands', 'attributesets', 'options'));
    }

    public function store(ProductValidate $request)
    {
        $qrcode = rand(100000000000, 199999999999);
        $slug = str_slug($request->name);
        $product = Product::whereSlug($slug)->first();
        $request['status'] = (boolean)$request->status;
        $request['slug'] = $product ? "$slug-$qrcode" : $slug;
        $request['qr_code'] = "storage/images/$code.png";

        $product = Product::create($request->all());
        $product->saveRelations($request);

        QrCode::format('png')->size(399)->generate($qrcode, storage_path("app/public/images/$qrcode.png"));

        if($product){
            return response()->json(['success' => 'Product successfully created!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }

    public function show(Product $product)
    {
        $product->load('categories', 'brand', 'attributes', 'options', 'metadata', 'images');
        return view('admin.product.show', compact('product'));
    }


    public function edit(Product $product)
    {
        $categories = Category::treeList();
        $brands = Brand::all();
        $attributesets = AttributeSet::all();
        $options = Option::where('is_global', 1)->get();
        $product->load('categories', 'brand', 'attributes', 'options', 'metadata', 'images');
        return view('admin.product.edit', compact('categories', 'brands', 'attributesets', 'options', 'product'));
    }

    public function update(ProductValidate $request, Product $product)
    {
        $request['status'] = (boolean)$request->status;
        $request['slug'] = str_slug($request->url);
        $product->update($request->all());
        $product->saveRelations($request);

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
            $product->metadata()->delete();
            if(File::exists($product->qr_code)) {
                File::delete($product->qr_code);
            }
            $product->delete();  
        });

        if($delete){
            return response()->json(['success' => 'Product successfully deleted!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }

    public function updateStatus(Product $product)
    {
        if($product->status){
            $product->status = false;
            $product->save();
            return response()->json(['success' => 'Product successfullly unpublished!']);
        }

        $product->status = true;
        $product->save();
        return response()->json(['success' => 'Product successfullly published!']);
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
