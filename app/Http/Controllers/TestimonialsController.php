<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonials;

class TestimonialsController extends Controller
{
  public function index()
  {
     $data = Testimonials::latest()->paginate(5);

     return view('admin.testimonials.index',compact('data'))
     ->with('i', (request()->input('page', 1) - 1) * 5);
  }

  public function create()
  {
     return view('admin.products.create');
  }


  public function store(Request $request)
  {
     $request->validate([
        'name' => 'required',
        'job' => 'required',
        'testimonial' => 'required',
        'star' => 'required',
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 

     ]);

     $input = $request->all(); 
     if ($image = $request->file('photo')) {
        $destinationPath = 'image/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $input['photo'] = "$profileImage";
     }

     Testimonials::create($input);

     return redirect()->route('testimonials.index')
     ->with('success','Testimonial created successfully.');
  }


    
    public function show(Testimonials $testimonial)
    {
       return view('admin.testimonials.show',compact('testimonial'));
    }

   
    public function edit(Testimonials $testimonial)
    {
       return view('admin.testimonials.edit',compact('testimonial'));
    }

   
    public function update(Request $request, Testimonials $testimonial)
    {

       $request->validate([
        'name' => 'required',
        'job' => 'required',
        'testimonial' => 'required',
        'star' => 'required',   
      ]);

       $input = $request->all();

       if ($image = $request->file('photo')) {
         $destinationPath = 'image/';
         $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $input['photo'] = "$profileImage";
      }else{
         unset($input['photo']);
      }

      $testimonial->update($input);

      return redirect()->route('testimonials.index')
      ->with('success','Testimonial updated successfully');
   }

   

    public function destroy(Testimonials $testimonial)
    {
       $testimonial->delete();

       return redirect()->route('testimonials.index')
       ->with('success','Testimonials deleted successfully');
    }
 }

