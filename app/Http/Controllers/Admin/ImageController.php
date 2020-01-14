<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Image;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function images()
    {
        return Laratables::recordsOf(Image::class, function($query)
        {
            return $query->latest('id');
        });
    }

    public function index()
    {
        $images = Image::latest()->get();
        return view('admin.image.index', compact('images'));
    }

    public function store(Request $request)
    {
        $image = $request->file('file');

        if (!Storage::disk('public')->exists('images'))
        {
            Storage::disk('public')->makeDirectory('images');
        }

        $request['name'] = $image->getClientOriginalName();
        $request['path'] = $image->store('images');
        $request['size'] = $image->getClientSize();
        $request['mime'] = $image->getMimeType();
        $request['extension'] = $image->getClientOriginalExtension();
        $upload = Image::create($request->all());

        if($upload){
            return response()->json(['success' => 'Image successfully uploaded!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }

    public function destroy(Request $request)
    {
        $delete = Image::find($request->id)->each(function ($image) {
            $this->removeImage($image->path());
            $image->delete();
        });

        if($delete){
            return response()->json(['success' => 'Image successfully deleted!']);
        }else{
            return response()->json(['error' => 'Deleting failed! Please try again!']);
        }
    }

    private function removeImage($path)
    {

        if(File::exists($path)) {
            File::delete($path);
        }
    }
}
