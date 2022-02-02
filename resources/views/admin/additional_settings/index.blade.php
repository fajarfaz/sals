@extends('layouts.main')

@section('content')
<div class="flex flex-row justify-between items-center mb-8 ">       
    <h2 class="inline-block text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight dark:text-gray-200">
        Additional Settings
    </h2>
    @if(empty($data->promo) )
    <button type="button" @click="showModal = true" class="rounded-lg bg-blue-400 hover:bg-blue-500 duration-300 text-white font-semibold px-4 py-2 w-max" >Settings Now</button>
       @endif
</div>

<div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="showModal" :class="{ 'fixed inset-0 z-40 flex items-center justify-center ': showModal }">
    <!--Dialog-->
    <div class="bg-white w-11/12 md:max-w-2xl  md:mt-10 md:my-10 text-sm mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModal" @click.away="showModal = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90">

        <div class="flex justify-between items-center pb-3">
            <p class="text-2xl font-bold border-b pb-2">Web Setting</p>
            <div class="cursor-pointer z-50" @click="showModal = false">
                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
            </div>
        </div>
        
        <form action="{{ route('additional_settings.store') }}" method="POST" enctype="multipart/form-data" class="pt-4 px-3">
            @csrf
            <div class="overflow-y-auto md:max-h-96 -mr-4 pr-4">             

                <div class="flex flex-row space-x-4 items-center mb-4">                    
                    <strong class="w-4/12 tracking-wider text-gray-700">Promotion:</strong>
                    <input type="file" name="promo"  placeholder="Promo Banner" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12" required value="{{ old('promotion') }}">
                </div>     
                <div class="flex flex-row space-x-4 items-center mb-4">                    
                    <strong class="w-4/12 tracking-wider text-gray-700">Finished Project:</strong>
                    <div class="w-8/12 flex flex-col space-y-2"> 
                        <div class="flex flex-row space-x-5 items-center ">
                            <label class="text-gray-600 w-3/12">Sablon</label>
                            <input type="number" name="finishproject[]" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200" required placeholder="Enter Count Clothes Project" required value="{{ old('finishproject[]') }}" >  
                        </div>
                        <div class="flex flex-row space-x-5 items-center ">
                            <label class="text-gray-600 w-3/12">Papper</label>
                            <input type="number" name="finishproject[]" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200" required placeholder="Enter Count Papper Project" required value="{{ old('finishproject[]') }}">  
                        </div>
                        <div class="flex flex-row space-x-5 items-center ">
                            <label class="text-gray-600 w-3/12">Plastic Cup</label>
                            <input type="number" name="finishproject[]" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200" required placeholder="Enter Count Cup Project" required value="{{ old('finishproject[]') }}">  
                        </div>
                        <div class="flex flex-row space-x-5 items-center ">
                            <label class="text-gray-600 w-3/12">Papper</label>
                            <input type="number" name="finishproject[]" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200" required placeholder="Enter Count Packaging Project" required value="{{ old('finishproject[]') }}">  
                        </div>
                    </div>                  
                </div>     
                <div class="flex flex-row space-x-4 items-center mb-4">                    
                    <strong class="w-4/12 tracking-wider text-gray-700">Outfit Today:</strong>
                    <input type="file" name="outfitImage"  placeholder="outfitImage" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12" >
                </div>    
                <div class="flex flex-row space-x-4 items-center mb-4">                    
                    <strong class="w-4/12 tracking-wider text-gray-700">Select Today Outfit:</strong>
                    <select  name="outfittoday[]" multiple="" class="w-8/12 px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 h-32">
                     @foreach ($product as $key => $value)
                      <option  value="{{$value->id}}"> {{$value->title}} </option>
                      @endforeach
                    </select>                      
                  </div>   

              </div>
              <div class="flex justify-end mt-4 pt-4 -mx-8 border-t px-7 space-x-2 bg-gray-50">                   
                <button class="modal-close px-4 p-3 rounded-lg text-gray-500 hover:bg-gray-200 bg-gray-100 hover:text-gray-600 mr-2 tracking-wider font-semibold" @click="showModal = false">Close</button>
                <button class="px-6 bg-blue-400 p-3 rounded-lg text-white hover:bg-blue-500 duration-300 font-semibold tracking-wider" type="submit" >Save</button>
            </div>
        </form>
     

    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


   <form action="{{ route('additional_settings.update', $data->id) }}" method="POST" enctype="multipart/form-data" class="pt-y px-3">
            @csrf
            @method('PUT')
            <div class=" -mr-4 pr-4">   
            @php
            $datas=explode(',',$data->finishproject);          
            $Outfitarray = explode(',',$data->outfittoday);
            @endphp           
                
                <div class="flex flex-row space-x-4 items-center mb-4">                    
                    <strong class="w-4/12 tracking-wider text-gray-700">Promotion:</strong>
                    <input type="file" name="promo"  placeholder="Promo Banner" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12"  value="{{ old('promotion') }}">
                </div>     
                <div class="flex flex-row space-x-4 items-center mb-4">                    
                    <strong class="w-4/12 tracking-wider text-gray-700">Finished Project:</strong>
                    <div class="w-8/12 flex flex-col space-y-2"> 
                        <div class="flex flex-row space-x-5 items-center ">
                            <label class="text-gray-600 w-3/12">Sablon</label>
                            <input type="number" name="finishproject[]" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200" required placeholder="Enter Count Sablon Project" required value="{{ $datas[0] }}" >  
                        </div>
                        <div class="flex flex-row space-x-5 items-center ">
                            <label class="text-gray-600 w-3/12">Papper</label>
                            <input type="number" name="finishproject[]" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200" required placeholder="Enter Count Sablon Project" required value="{{ $datas[1] }}">  
                        </div>
                        <div class="flex flex-row space-x-5 items-center ">
                            <label class="text-gray-600 w-3/12">Plastic CUp</label>
                            <input type="number" name="finishproject[]" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200" required placeholder="Enter Count Sablon Project" required value="{{ $datas[2] }}">  
                        </div>
                        <div class="flex flex-row space-x-5 items-center ">
                            <label class="text-gray-600 w-3/12">Papper</label>
                            <input type="number" name="finishproject[]" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200" required placeholder="Enter Count Sablon Project" required value="{{ $datas[3] }}">  
                        </div>
                    </div>                  
                </div>     
                <div class="flex flex-row space-x-4 items-center mb-4">                    
                    <strong class="w-4/12 tracking-wider text-gray-700">Outfit Today:</strong>
                    <input type="file" name="outfitImage"  placeholder="outfitImage" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12" >
                </div>    

              
     

              
               

                <div class="flex flex-row space-x-4 items-center mb-4">                    
                    <strong class="w-4/12 tracking-wider text-gray-700">Select Today Outfit:</strong>
                    <select  name="outfittoday[]" multiple="" class="w-8/12 px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 h-32">
                        @php $true=0 @endphp
                         @foreach ($product as $key => $value)                     
                            @foreach($Outfitarray as $valie)
                                @if($value->id == $valie)
                                    <option value="{{$true = $value->id}}" selected > {{$value->title}} </option>                              
                                @endif
                            @endforeach

                            @if($value->id != $valie && $value->id != $true)
                                <option value="{{$value->id}}"  > {{$value->title}} </option>
                            @endif
                        @endforeach
                    </select>                      
                  </div>   

              </div>
              <div class="flex justify-end mt-4 pt-4 -mx-8 border-t px-7 space-x-2 bg-gray-50 pb-10">                                 
                <button class="px-6 bg-blue-400 p-3 rounded-lg text-white hover:bg-blue-500 duration-300 font-semibold tracking-wider" type="submit" >Save Settings</button>
            </div>
        </form>

@endsection