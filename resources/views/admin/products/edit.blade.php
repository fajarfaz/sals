@extends('layouts.main')

@section('content')
<div class="flex flex-row border-b pb-2 mb-8 items-center justify-between">       
    <div class="flex flex-col ">
        <h2 class="inline-block text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight dark:text-gray-200">
            Editing Product
        </h2>
        <label class="text-blue-600 font-semibold text-xl uppercase">{{ $product->title }}</label>
    </div>
    <a href="{{route('products.index')}}" class="font-semibold bg-gray-100 shadow-md border hover:bg-gray-200 duration-300 text-gray-700 px-6 py-2 rounded-lg"> Back to Product</a>
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

<form action="{{ route('products.update',$product->id) }}" method="POST"  enctype="multipart/form-data" >
    @csrf
    @method('PUT')
  
    <div class="overflow-y-hidden"  x-data="showImage()">
        <div class="flex flex-row space-x-4 items-center mb-4">                    
            <strong class="w-4/12 tracking-wider text-gray-700">Title:</strong>
            <input type="text" name="title" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12" placeholder="Enter Title" name="title" value="{{ $product->title }}" >                    
        </div>
        <div class="flex flex-row space-x-4 items-center mb-4">                    
            <strong class="w-4/12 tracking-wider text-gray-700">Brand:</strong>
            <input type="text" name="brand" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12" placeholder="Enter Brand" name="brand" value="{{ $product->brand }}" >                    
        </div>
        <div class="flex flex-row space-x-4 items-center mb-4">                    
            <strong class="w-4/12 tracking-wider text-gray-700">Category:</strong>
            <select class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12"  name="category_id">   

                @foreach ($categories as $category)
                <option value="{{$category->id}}" @if($category->id == $product->category->id) selected @endif >{{$category->name}}</option>
                @endforeach
            </select>                            
        </div>
        <div class="flex flex-row space-x-4 items-center mb-4">                    
            <strong class="w-4/12 tracking-wider text-gray-700">Price:</strong>
            <input type="number" name="price" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12" placeholder="Enter Price" name="price" value="{{ $product->price }}" >                    
        </div>
        <div class="flex flex-row space-x-4 items-center mb-4">                    
            <strong class="w-4/12 tracking-wider text-gray-700">Description:</strong>
            <textarea class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12"  style="height:150px" name="description" placeholder="Enter Description">{{ $product->description }}</textarea> 
        </div>  

        <div class="flex flex-row space-x-4 items-center mb-4">                    
            <strong class="w-4/12 tracking-wider text-gray-700">Color / Variant:</strong>

            
            <div class="grid grid-cols-5 gap-4">
                <div class="flex flex-row items-center space-x-2">
                    <input type="checkbox" name="color[]" id="0" value="white"
                    @if(strstr("$product->color","white")) checked @endif />
                    <label for="0">White</label>
                </div>
                <div class="flex flex-row items-center space-x-2">
                    <input type="checkbox" name="color[]" id="1" value="red" 
                    @if(strstr("$product->color","red")) checked @endif />
                    <label for="1" class="text-red-500">Red</label>
                </div>
                <div class="flex flex-row items-center space-x-2">
                    <input type="checkbox" name="color[]" id="2" value="yellow"
                    @if(strstr("$product->color","yellow")) checked @endif />
                    <label for="2" class="text-yellow-500">Yellow</label>
                </div>
                <div class="flex flex-row items-center space-x-2">
                    <input type="checkbox" name="color[]" id="3" value="blue"
                    @if(strstr("$product->color","blue")) checked @endif />
                    <label for="3" class="text-blue-500">Blue</label>
                </div>
                <div class="flex flex-row items-center space-x-2">
                    <input type="checkbox" name="color[]" id="4" value="black"
                    @if(strstr("$product->color","black")) checked @endif />
                    <label for="4">Black</label>
                </div>   
                <div class="flex flex-row items-center space-x-2">
                    <input type="checkbox" name="color[]" id="9" value="gray" 
                    @if(strstr("$product->color","gray")) checked @endif />
                    <label for="9" class="text-gray-700" >Gray</label>
                </div>   
                <div class="flex flex-row items-center space-x-2">
                    <input type="checkbox" name="color[]" id="10" value="green"
                    @if(strstr("$product->color","green")) checked @endif />
                    <label for="10" class="text-green-500" >Green</label>
                </div>   
                <div class="flex flex-row items-center space-x-2">
                    <input type="checkbox" name="color[]" id="11" value="cyan"
                    @if(strstr("$product->color","cyan")) checked @endif />
                    <label for="11" class="text-cyan-500" >Cyan</label>
                </div>                         
            </div>  
        </div>
        <div class="flex flex-row space-x-4 items-center mb-4">                    
            <strong class="w-4/12 tracking-wider text-gray-700">Ingredients:</strong>
            <input type="text" name="ingredients" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12" placeholder="Enter Ingredients" value="{{ $product->ingredients }}">                    
        </div>
        <div class="flex flex-row space-x-4 items-center mb-4">                    
            <strong class="w-4/12 tracking-wider text-gray-700">Size:</strong>
            <div class="grid grid-cols-5 gap-4">
                <div class="flex flex-row items-center space-x-2">
                    <input type="checkbox" name="size[]" id="5" value="s"
                    @if(strstr("$product->size","s")) checked @endif />
                    <label for="5">Small</label>
                </div>
                <div class="flex flex-row items-center space-x-2">
                    <input type="checkbox" name="size[]" id="12" value="m"
                    @if(strstr("$product->size","m")) checked @endif />
                    <label for="12">Medium</label>
                </div>
                <div class="flex flex-row items-center space-x-2">
                    <input type="checkbox" name="size[]" id="6" value="l"
                    @if(strstr("$product->size","l")) checked @endif />
                    <label for="6">Large</label>
                </div>
                <div class="flex flex-row items-center space-x-2">
                    <input type="checkbox" name="size[]" id="7" value="xl"
                    @if(strstr("$product->size","xl")) checked @endif />
                    <label for="7">Xtra Large</label>
                </div>
                <div class="flex flex-row items-center space-x-2">
                    <input type="checkbox" name="size[]" id="8" value="xxl"
                    @if(strstr("$product->size","xxl")) checked @endif />
                    <label for="8">XXL</label>
                </div>                     
            </div>            
        </div>
        <div class="flex flex-row space-x-4 items-center mb-4">                    
            <strong class="w-4/12 tracking-wider text-gray-700">Image:</strong>
            <div class="flex flex-row space-y-4 w-8/12 ">                    
               <img src="/image/{{ $product->image }}" class="w-16 object-cover mr-4" id="preview">                                    
               <input type="file" name="image"  placeholder="image" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-full h-min" value="{{ $product->image }}"  accept="image/*" @change="showPreview(event)">
           </div>  
       </div>     
       <div class="flex flex-row space-x-4 items-center mb-4">                    
        <strong class="w-4/12 tracking-wider text-gray-700">Pict:</strong>
        <div class="grid grid-cols-1 gap-4">
            <div class="font-semibold flex flex-row space-x-2 items-center text-md">
                1. <input type="file" name="pict1"  placeholder="image" class="ml-3 px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200" accept="image/*" @change="picPreview(event)" >
                <img src="/image/{{ $product->pict1 }}" class="w-16 object-cover" id="picPreview">
            </div>
            <div class="font-semibold flex flex-row space-x-2 items-center text-md">
                2. <input type="file" name="pict2"  placeholder="pict2" class="ml-3 px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200" accept="image/*" @change="picPreview1(event)" >
                <img src="/image/{{ $product->pict2 }}" class="w-16 object-cover" id="picPreview1">
            </div>
            <div class="font-semibold flex flex-row space-x-2 items-center text-md">
                3. <input type="file" name="pict3"  placeholder="image" class="ml-3 px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200" accept="image/*" @change="picPreview2(event)" >
                <img src="/image/{{ $product->pict3 }}" class="w-16 object-cover" id="picPreview2"> 
            </div>
        </div>
    </div>              
    <div class="flex flex-row space-x-4 items-center mb-4">                    
        <strong class="w-4/12 tracking-wider text-gray-700">Stock:</strong>
        <input type="number" name="stock" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12" placeholder="Enter stock" value="{{ $product->stock }}">                    
    </div>
</div>
<div class="flex justify-end mt-4 pt-4  border-t px-7 space-x-2 bg-gray-50 -mx-8 pb-10">                 
    <button class="px-8 tracking-wider bg-blue-400 p-3 rounded-lg text-white hover:bg-blue-500 duration-300 font-semibold tracking-wider" type="submit" >Save</button>
</div>

</form>

<script>
    function showImage() {
        return {
            showPreview(event) {
                if (event.target.files.length > 0) {
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("preview");
                    preview.src = src;
                    preview.style.display = "block";
                }
            },
             picPreview(event) {
                if (event.target.files.length > 0) {
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("picPreview");
                    preview.src = src;
                    preview.style.display = "block";
                }
            },
            picPreview1(event) {
                if (event.target.files.length > 0) {
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("picPreview1");
                    preview.src = src;
                    preview.style.display = "block";
                }
            },
            picPreview2(event) {
                if (event.target.files.length > 0) {
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("picPreview2");
                    preview.src = src;
                    preview.style.display = "block";
                }
            }
        }
    }

</script>
@endsection