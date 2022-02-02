<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\AdditionalSettings;
use App\Models\Testimonials;
use App\Models\Category;


class DashboardController extends Controller
{


   public function index()
    { 
      $array = AdditionalSettings::all();
      $outfittodayArray = explode(',', $array[0]->outfittoday);   

      $i=0;   
      $collection = new Collection();  
      foreach ($outfittodayArray as $key => $value) {                 
        $item = Product::where('id', $value)->first();                 
        $i++;
        $collection->push($item);
    }

        return view('welcome',[         
            "product" => Product::all()->sortByDesc('id'),
            "settings" => AdditionalSettings::all(),
            "testimonials" => Testimonials::all(),
            "outfittoday" => $collection,
            "category" => Category::all()
        ]);
       
    }

      public function show($slug)
    {
        return view('product_detail', [
        "products" => Product::all(),
        "product" => Product::find($slug),
         "category" => Category::all()
      ]);
    }

}
