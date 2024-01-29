<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EbookCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class EbookCategoryController extends Controller
{

    public function view(){
        return view('backend.pages.ebookcategory.create');
    }

    public function show(){
        $ebookcategory=EbookCategory::all();
        return view('backend.pages.ebookcategory.list',compact('ebookcategory'));
    }


    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'title' => 'required|string',
        'description' => 'required',
        'image' => 'required|mimes:jpg,jpeg,png',

    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    $slug = Str::slug($request->input('title'));

    $cleanDescription = strip_tags($request->input('description'));
    $cleanmetaDescription = strip_tags($request->input('meta_description'));
    $ebook = EbookCategory::create([
        'title' => $request->input('title'),
        'slug'=> $slug,
        'description' => $cleanDescription,

    ]);

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;

        $file->move('uploads/ebookcategory/', $filename);

        $ebook->image = $filename;
        $ebook->save();
    }

    return redirect()->route('ebookcategory-list')->with('info', 'Data Added Successfully');
}


    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $ebook = EbookCategory::find($del);
        $path='uploads/ebookcategory/'.$ebook->image;
        if(File::exists($path)){
          File::delete($path);
        }
        $ebook->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }


    public function edit($id){
        $ebookcategory=EbookCategory::find($id);
        return view('backend.pages.ebookcategory.edit',compact('ebookcategory'));

    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png',

        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $ebook = EbookCategory::findOrFail($id);
        $slug = Str::slug($request->input('title'));
        $cleanDescription = strip_tags($request->input('description'));
        $cleanmetaDescription = strip_tags($request->input('meta_description'));
    
        $ebook->title = $request->input('title');
        $ebook->slug = $slug;
        $ebook->description =  $cleanDescription ;
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            $file->move('uploads/ebookcategory/', $filename);
    
            // Delete the previous image file if it exists
            if (!empty($ebook->image)) {
                $oldImagePath = 'uploads/ebookcategory/' . $ebook->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            $ebook->image = $filename;
        }
    
        $ebook->save();

        return redirect()->route('ebookcategory-list')->with('info', 'Data Updated Successfully');
    }
}
