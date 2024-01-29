<?php

namespace App\Http\Controllers\Backend;

use App\Models\Ebook;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EbookCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class EbookController extends Controller
{
    public function view(){
        $ebookcategory=EbookCategory::all();
        return view('backend.pages.ebook.create',compact('ebookcategory'));
    }

    public function show(){
        $ebook=Ebook::all();
        return view('backend.pages.ebook.list',compact('ebook'));
    }


    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'ebookcategory_id' => 'required|exists:ebook_categories,id',
        'title' => 'required|string',
        'description' => 'required',
        'image' => 'required|mimes:jpg,jpeg,png',
        'link' => 'required',
        'meta_title' => 'required|string',
        'meta_keyword' => 'required|string',
        'meta_description' => 'required|string',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    $slug = Str::slug($request->input('title'));

    $cleanDescription = strip_tags($request->input('description'));
    $cleanmetaDescription = strip_tags($request->input('meta_description'));
    $ebook = Ebook::create([
        'ebookcategory_id' => $request->input('ebookcategory_id'),
        'title' => $request->input('title'),
        'slug'=> $slug,
        'description' => $cleanDescription,
        'link' => $request->input('link'),
        'meta_title' => $request->input('meta_title'),
        'meta_keyword' => $request->input('meta_keyword'),
        'meta_description' => $cleanmetaDescription,
    ]);

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;

        $file->move('uploads/ebook/', $filename);

        $ebook->image = $filename;
        $ebook->save();
    }

    return redirect()->route('ebook-list')->with('info', 'Data Added Successfully');
}


    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $ebook = Ebook::find($del);
        $path='uploads/ebook/'.$ebook->image;
        if(File::exists($path)){
          File::delete($path);
        }
        $ebook->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }


    public function edit($id){
        $ebook=Ebook::find($id);
        $ebookcategory=EbookCategory::all();

        return view('backend.pages.ebook.edit',compact('ebook','ebookcategory'));

    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'ebookcategory_id' => 'required|exists:ebook_categories,id',
            'title' => 'required|string',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png',
            'link' => 'required',
            'meta_title' => 'required|string',
            'meta_keyword' => 'required|string',
            'meta_description' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $ebook = Ebook::findOrFail($id);
        $slug = Str::slug($request->input('title'));
        $cleanDescription = strip_tags($request->input('description'));
        $cleanmetaDescription = strip_tags($request->input('meta_description'));
    
        $ebook->title = $request->input('title');
        $ebook->ebookcategory_id = $request->input('ebookcategory_id');
        $ebook->slug = $slug;
        $ebook->description =  $cleanDescription ;
        $ebook->link = $request->input('link');
        $ebook->meta_title = $request->input('meta_title');
        $ebook->meta_keyword = $request->input('meta_keyword');
        $ebook->meta_description =$cleanmetaDescription;
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            $file->move('uploads/ebook/', $filename);
    
            // Delete the previous image file if it exists
            if (!empty($ebook->image)) {
                $oldImagePath = 'uploads/ebook/' . $ebook->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            $ebook->image = $filename;
        }
    
        $ebook->save();

        return redirect()->route('ebook-list')->with('info', 'Data Updated Successfully');
    }

}
