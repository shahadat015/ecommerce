<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Review;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
	public function reviews()
    {
    	return Laratables::recordsOf(Review::class, function($query)
        {
            return $query->latest('id');
        });
    }

    public function index()
    {
    	return view('admin.review.index');
    }

    public function edit(Review $review)
    {
    	return view('admin.review.edit', compact('review'));
    }

    public function update(Review $review, Request $request)
    {
    	$request->validate([
    		'reviewer_name' => 'required|string|max:255'
    	]);

    	$request['status'] = (boolean) $request->status;
    	$update = $review->update($request->all());

    	if($update){
    		return response()->json(['success' => 'Review successfully updated!']);
    	}else{
    		return response()->json(['error' => 'Ops! Please try again']);
    	}
    }

    public function destroy(Request $request)
    {
    	$delete = Review::destroy($request->id);

    	if($delete){
    		return response()->json(['success' => 'Review successfully deleted!']);
    	}else{
    		return response()->json(['error' => 'Ops! Please try again']);
    	}
    }

    public function updateStatus(Review $review)
    {
        if($review->status){
            $review->status = false;
            $review->save();
            return response()->json(['success' => 'Review successfully Approved!']);
        }

        $review->status = true;
        $review->save();
        return response()->json(['success' => 'Review successfully unapproved!']);
    }
}
