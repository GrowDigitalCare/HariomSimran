<?php

namespace App\Http\Controllers\Backend;

use App\Models\SindhiTipno;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SindhiTipnoController extends Controller
{
     public function view(){
        return  view('backend.pages.tipno.create');
     }

     public function list(){

        $tipno=SindhiTipno::all();

        return  view('backend.pages.tipno.list',compact('tipno'));
     }

     public function store(Request $request)
    {
        $request->validate([
       
            'title' => 'required|string',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'description' => 'required|string',
            'image' => 'required|mimes:jpg,jpeg,png',
         
        ]);
       
        $slug = Str::slug($request->input('title'));
        $cleanDescription = strip_tags($request->input('description'));
       
        $tipno = SindhiTipno::create([
            'title' => $request->input('title'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
            'slug'=> $slug,
            'description' => $cleanDescription,
            'status'=>'inactive',
        ]);


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            $file->move('uploads/Tipno/', $filename);
    
            $tipno->image = $filename;
            $tipno->save();
        }
        return redirect()->route('tipno-list')->with('info', 'Tipno created successfully.');
    }


  public function edit($id){
    $tipno=SindhiTipno::find($id);
    return view('backend.pages.tipno.edit',compact('tipno'));
  }



  public function update(Request $request, $id)
  {
      $validator = Validator::make($request->all(), [
        'title' => 'required|string',
          'start' => 'required|date',
          'end' => 'required|date|after:start',
          'description' => 'required|string',
          'image' => 'required|mimes:jpg,jpeg,png',
      ]);
  
      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
      }
  
      $tipno = SindhiTipno::findOrFail($id);
      $cleanDescription = strip_tags($request->input('description'));
      $slug = Str::slug($request->input('title'));
      $tipno->title = $request->input('title');
      $tipno->start = $request->input('start');
      $tipno->end = $request->input('end');
      $tipno->description = $cleanDescription;


  
      if ($request->hasFile('image')) {
          $file = $request->file('image');
          $ext = $file->getClientOriginalExtension();
          $filename = time() . '.' . $ext;
  
          $file->move('uploads/Tipno/', $filename);
  
          // Delete the previous image file if it exists
          if (!empty($tipno->image)) {
              $oldImagePath = 'uploads/Tipno/' . $tipno->image;
              if (file_exists($oldImagePath)) {
                  unlink($oldImagePath);
              }
          }
  
          $tipno->image = $filename;
      }
  
      $tipno->save();

      return redirect()->route('tipno-list')->with('info', 'Data Updated Successfully');
  }


  public function delete($id){
  $tipno=SindhiTipno::findOrFail($id);
  $tipno->delete();
  return redirect()->back()->with('warning','Tipno Deleted');
  }

    
}
