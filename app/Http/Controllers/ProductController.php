<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
 public function index()
 {
    $product = Product::latest()->paginate(5);
    
    return view('admin.products.index',[
        'categories' => Category::all(),
    ],compact('product'))
    ->with('i', (request()->input('page', 1) - 1) * 5);
    
}
public function create()
{
    return view('admin.products.create');
}

public function store(Request $request)
{
 $request->validate([
    'title' => 'required',
    'brand' => 'required',
    'category_id' => 'required',
    'price' => 'required',
    'size' => 'required',
    'color' => 'required',
    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
    'description' => 'required',
    'ingredients' => 'required',
    'pict1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
    'pict2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
    'pict3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',      

]);
 
 $request->merge([ 
    'color' => implode(', ', (array) $request->get('color'))
]);
 $request->merge([ 
    'size' => implode(', ', (array) $request->get('size'))
]);
 
 $input = $request->all(); 
 if ($image = $request->file('image')) {
    $destinationPath = 'image/';
    $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
    $image->move($destinationPath, $profileImage);
    $input['image'] = "$profileImage";
}
if ($image = $request->file('pict1')) {
    $destinationPath = 'image/';
    $profileImage = date('YmdHis') . "p1." . $image->getClientOriginalExtension();
    $image->move($destinationPath, $profileImage);
    $input['pict1'] = "$profileImage";
}
if ($image = $request->file('pict2')) {
    $destinationPath = 'image/';
    $profileImage = date('YmdHis') . "p2." . $image->getClientOriginalExtension();
    $image->move($destinationPath, $profileImage);
    $input['pict2'] = "$profileImage";
}
if ($image = $request->file('pict3')) {
    $destinationPath = 'image/';
    $profileImage = date('YmdHis') . "p3." . $image->getClientOriginalExtension();
    $image->move($destinationPath, $profileImage);
    $input['pict3'] = "$profileImage";
}
Product::create($input);

return redirect()->route('products.index')
->with('success','Product created successfully.');
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    // public function show(Product $product)
    // {
    //     return view('admin.products.show',compact('product'));
    // }

     public function show(Product $product)
    {

        return view('product_detail',[
            'product' => $product,
            'category' => Category::all(),
        ],compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit',[
            'categories' => Category::all(),
        ],compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'brand' => 'required',
            'size' => 'required',
            'color' => 'required',           
            'ingredients' => 'required',
        ]);

        $request->merge([ 
            'color' => implode(', ', (array) $request->get('color'))
        ]);
        $request->merge([ 
            'size' => implode(', ', (array) $request->get('size'))
        ]);
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
        if ($image = $request->file('pict1')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "p1." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['pict1'] = "$profileImage";
        }else{
            unset($input['pict1']);
        }
        if ($image = $request->file('pict2')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "p2." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['pict2'] = "$profileImage";
        }else{
            unset($input['pict2']);
        }
        if ($image = $request->file('pict3')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "p3." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['pict3'] = "$profileImage";
        }else{
            unset($input['pict3']);
        }

        $product->update($input);

        return redirect()->route('products.index')
        ->with('success','product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
        ->with('success','product deleted successfully');
    }
}
