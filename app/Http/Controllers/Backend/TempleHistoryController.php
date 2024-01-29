<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TempleHistory;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class TempleHistoryController extends Controller
{
    public function view()
    {
        $categories=Category::all();
        return view('backend.pages.temple.create',compact('categories'));
    }

    public function show()
    {
        $temple = TempleHistory::all();
        return view('backend.pages.temple.list', compact('temple'));
    }


    // Import the Auth facade at the beginning of your file

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string',
            'videourl' => 'required|string',
            'description' => 'required',
            'meta_title' => 'required|string',
            'meta_keyword' => 'required|string',
            'meta_description' => 'required|string',
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $slug = Str::slug($request->input('title'));

        $cleanDescription = strip_tags($request->input('description'));
        $cleanmetaDescription = strip_tags($request->input('meta_description'));
        $temple = TempleHistory::create([
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'slug' => $slug,
            'description' => $cleanDescription,
            'meta_title' => $request->input('meta_title'),
            'meta_keyword' => $request->input('meta_keyword'),
            'videourl' => $request->input('videourl'),
            'meta_description' => $cleanmetaDescription,
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            $file->move('uploads/Temple/', $filename);
    
            $temple->image = $filename;
            $temple->save();
        }

        return redirect()->route('temple-list')->with('info', 'Data Added Successfully');
    }


    public function delete($id)
    {
        $temple = TempleHistory::findOrFail($id);
        $temple->delete();
        return redirect()->back()->with('warning', 'Temple Data Deleted!!!');
    }


    public function edit($id)
    {
        $categories=Category::all();
        $templeHistory = TempleHistory::findOrFail($id);
        return view('backend.pages.temple.edit', compact('templeHistory','categories'));
    }

   
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string',
            'videourl' => 'required|string',
            'description' => 'required',
            'meta_title' => 'required|string',
            'meta_keyword' => 'required|string',
            'meta_description' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $temple = TempleHistory::findOrFail($id);
        $slug = Str::slug($request->input('title'));
        $cleanDescription = strip_tags($request->input('description'));
        $cleanmetaDescription = strip_tags($request->input('meta_description'));
    
        $temple->title = $request->input('title');
        $temple->category_id = $request->input('category_id');
        $temple->slug = $slug;
        $temple->description =  $cleanDescription;
        $temple->meta_title = $request->input('meta_title');
        $temple->meta_keyword = $request->input('meta_keyword');
        $temple->videourl = $request->input('videourl');
        $temple->meta_description =$cleanmetaDescription;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            $file->move('uploads/Temple/', $filename);
    
            // Delete the previous image file if it exists
            if (!empty($temple->image)) {
                $oldImagePath = 'uploads/Temple/' . $temple->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            $temple->image = $filename;
        }
        $temple->save();
    
        return redirect()->route('temple-list')->with('info', 'Data Updated Successfully');
    }
   
}
