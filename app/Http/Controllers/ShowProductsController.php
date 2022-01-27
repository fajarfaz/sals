<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

use Illuminate\Http\Request;
use App\Models\Product;


class ShowProductsController extends Controller
{
    

    public function sort($sort)
    {
      
      return view('products',[
        "sort" => $sort,
        "searching" => Product::all('title'),
        "products" => Product::orderBy('price')->paginate(3)->withQueryString(),        
    ]);

    }
   

    public function index()
    { 
      
       return view('products',[
            "searching" => Product::all('title'),
            "sort" => 'price',
            "products" => Product::latest()->paginate(2)->withQueryString()        

        ]);
         
}
}