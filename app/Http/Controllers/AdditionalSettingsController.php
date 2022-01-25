<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdditionalSettings;
use App\Models\Product;

class AdditionalSettingsController extends Controller
{
 public function index()
 {

     $data = AdditionalSettings::all()->first->limit(1);    
     return view('admin.additional_settings.index',compact('data'),[
         'product' => Product::all(),        
     ]);

 }

 public function create()
 {
   return view('admin.additional_settings.create',[
     'product' => Product::all()
    ]);
}

public function store(Request $request)
{
    $request->validate([
        'promo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        'finishproject' => 'required',
        'outfitImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096', 
        'outfittoday' => 'required'
    ]);

    $request->merge([ 
        'finishproject' => implode(',', (array) $request->get('finishproject'))
    ]);
    $request->merge([ 
        'outfittoday' => implode(',', (array) $request->get('outfittoday'))
    ]);

    $input = $request->all(); 
    if ($image = $request->file('promo')) {
        $destinationPath = 'image/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $input['promo'] = "$profileImage";
    }
    if ($image = $request->file('outfitImage')) {
        $destinationPath = 'image/';
        $profileImage = date('YmdHis') . "p1." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $input['outfitImage'] = "$profileImage";
    }

    AdditionalSettings::create($input);
    return redirect()->route('additional_settings.index')
    ->with('success','Setting Editeed successfully.');
}


  public function show(Product $product)
    {
        return view('admin.products.show',compact('product'));
    }


public function edit(AdditionalSettings $additionalSettings)
{
    return view('admin.additional_settings.index',compact('additionalSettings'));
}


public function update(Request $request, AdditionalSettings $additionalSetting)
{
      $request->validate([
        'promo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        'finishproject' => 'required',
        'outfitImage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096', 
        'outfittoday' => 'required'
     ]);

      $request->merge([ 
        'finishproject' => implode(',', (array) $request->get('finishproject'))
    ]);
      $request->merge([ 
        'outfittoday' => implode(',', (array) $request->get('outfittoday'))
    ]);

       $input = $request->all();

       if ($image = $request->file('promo')) {
        $destinationPath = 'image/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $input['promo'] = "$profileImage";
        }else{
             unset($input['promo']);
        }

        if ($image = $request->file('outfitImage')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "p1." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['outfitImage'] = "$profileImage";
        }else{
             unset($input['outfitImage']);
        }
      

      $additionalSetting->update($input);

      return redirect()->route('additional_settings.index')
      ->with('success','Settings updated successfully');
   }

   


public function destroy(AdditionalSettings $additionalSettings)
{
    $additionalSettings->delete();

    return redirect()->route('additional_settings.index')
    ->with('success','Setting Edited successfully');
}

}
