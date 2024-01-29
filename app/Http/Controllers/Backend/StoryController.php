<?php

namespace App\Http\Controllers\Backend;

use App\Models\Story;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StoryController extends Controller
{
     public function view(){
        return view('backend.pages.story.create');
     }

     public function show(){
        $story=Story::all();
        return view('backend.pages.story.list',compact('story'));
     }


     // Import the Auth facade at the beginning of your file

     public function store(Request $request)
     {
         $request->validate([
             'title' => 'required|string',
             'date' => 'required|date',
             'description' => 'required|string',
             'image' => 'required|mimes:jpg,jpeg,png',
         ]);
     
         $slug = Str::slug($request->input('title'));
         $cleanDescription = strip_tags($request->input('description'));

         $userId = Auth::id();
     
         $story = Story::create([
             'user_id' => $userId,
             'title' => $request->input('title'),
             'date' => $request->input('date'),
             'slug' => $slug,
             'description' => $cleanDescription,
             'status' => 'inactive',
         ]);
     
         if ($request->hasFile('image')) {
             $file = $request->file('image');
             $ext = $file->getClientOriginalExtension();
             $filename = time() . '.' . $ext;
     
             $file->move('uploads/Story/', $filename);
     
             $story->image = $filename;
             $story->save();
         }
     
         return redirect()->route('story-list')->with('info', 'Story created successfully.');
     }
     

     public function delete($id)
     {
    $story=Story::findOrFail($id);
   $story->delete();
   return redirect()->back()->with('warning','Story Data Deleted!!!');
     }


     public function edit($id)
     {
    $story=Story::findOrFail($id);
    return view('backend.pages.story.edit',compact('story'));
     }



     public function update(Request $request, $id)
     {
         $validator = Validator::make($request->all(), [
             'title' => 'required|string',
             'date' => 'required|date',
             'description' => 'required|string',
             'image' => 'required|mimes:jpg,jpeg,png',
         ]);
     
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator)->withInput();
         }
     
         $story = Story::findOrFail($id);
         $slug = Str::slug($request->input('title'));
         $cleanDescription = strip_tags($request->input('description'));
     
         $story->title = $request->input('title');
         $story->date = $request->input('date');
         $story->slug = $slug;
         $story->description =  $cleanDescription ;

     
         if ($request->hasFile('image')) {
             $file = $request->file('image');
             $ext = $file->getClientOriginalExtension();
             $filename = time() . '.' . $ext;
     
             $file->move('uploads/Story/', $filename);
     
             // Delete the previous image file if it exists
             if (!empty($story->image)) {
                 $oldImagePath = 'uploads/Story/' . $story->image;
                 if (file_exists($oldImagePath)) {
                     unlink($oldImagePath);
                 }
             }
     
             $story->image = $filename;
         }
     
         $story->save();
 
         return redirect()->route('story-list')->with('info', 'Data Updated Successfully');
     }


}
