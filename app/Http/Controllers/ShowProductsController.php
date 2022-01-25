<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

use Illuminate\Http\Request;
use App\Models\Product;


class ShowProductsController extends Controller
{
    

    public function price()
    {
      $collection = collect(Product::get());
      $filterd = $collection->sortBy(function ($data, $key) {
        return $data['price'].$data['title'];
    });
      $kirim = $filterd->all();
         $users->appends(['sort' => 'votes']);
        return view('products',[
         "sort" => 'price',
            "searching" => Product::all('title'),
            "products" => Product::orderBy('price')->paginate(2)->withQueryString()        
        
        ]);

    }
   

    public function index()
    { 
      
       return view('products',[
            "searching" => Product::all('title'),
            "products" => Product::latest()->paginate(2)->withQueryString()        

        ]);
         
}
}