<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ShowProductsController extends Controller
{
    

    public function index()
    { 
        
        $title='';
        $category='%%';
       
       if(request('category')){
        $category= Category::firstWhere('slug', request('category'));
        $title= ' in ' . $category->name;
        $category = $category->id;
       }elseif(request('search')){
         $title= ' in ' . request('search');
       }

       if(request('sort')){       
        $sort = request('sort');
       }else{
         $sort='created_at';
       }

       return view('products',[
            "title" => "All Product" . $title, 
            "searching" => Product::all('title'),            
             "category" => Category::all(),
             "sort" => $sort, 
            "products" => Product::filter(request(['category','search']))->orderBy($sort)->paginate(20)->withQueryString()        

        ]);
         
}
}