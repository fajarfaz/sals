<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
 public function index()
     {
        $category = Category::latest()->paginate(5);
        
        return view('admin.category.index',compact('category'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    public function create()
    {
        return view('admin.category.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);
        $input = $request->all(); 
        Category::create($input);

        return redirect()->route('category.index')
        ->with('success','Category created successfully.');

    }    

    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request, Category $category)
    {

        $request->validate([
          'name' => 'required',
          'slug' => 'required'
      ]);

        $category->update($input);
        return redirect()->route('category.index')
        ->with('success','Category updated successfully');

    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')
        ->with('success','Category deleted successfully');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);

    }
}
