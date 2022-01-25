<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ShowProductsController extends Controller
{
    

    public function index()
    { 
       return view('products',[

            "product" => Product::all(),         

        ]);
         
}
}