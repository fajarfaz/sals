@extends('layouts.main')

@section('content')
<div class="flex flex-row justify-between items-center mb-8 ">       
    <h2 class="inline-block text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight dark:text-gray-200">
        Products Manage
    </h2>
    <button type="button" @click="showModal = true" class="rounded-lg bg-blue-400 hover:bg-blue-500 duration-300 text-white font-semibold px-4 py-2 w-max" >Create New Product</button>
</div>

<div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="showModal" :class="{ 'fixed inset-0 z-40 flex items-center justify-center ': showModal }">
    <!--Dialog-->
    <div class="bg-white w-11/12 md:max-w-2xl  md:mt-10 md:my-10 text-sm mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModal" @click.away="showModal = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90">

        <div class="flex justify-between items-center pb-3">
            <p class="text-2xl font-bold border-b pb-2">New Product</p>
            <div class="cursor-pointer z-50" @click="showModal = false">
                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
            </div>
        </div>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="pt-4 px-3">
            @csrf
            <div class="overflow-y-auto md:max-h-96 -mr-4 pr-4">
                <div class="flex flex-row space-x-4 items-center mb-4">                    
                    <strong class="w-4/12 tracking-wider text-gray-700">Title:</strong>
                    <input type="text" name="title" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12" placeholder="Enter Title" value="{{ old('title') }}">                    
                </div>
                <div class="flex flex-row space-x-4 items-center mb-4">                    
                    <strong class="w-4/12 tracking-wider text-gray-700">Brand:</strong>
                    <input type="text" name="brand" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12" placeholder="Enter Brand"  value="{{ old('brand') }}">                
                </div>
                <div class="flex flex-row space-x-4 items-center mb-4">                    
                    <strong class="w-4/12 tracking-wider text-gray-700">Category:</strong>
                    <select class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12"  name="category_id">
                        <option selected value="">Choose One</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>                            
                </div>
                  <div class="flex flex-row space-x-4 items-center mb-4">                    
                    <strong class="w-4/12 tracking-wider text-gray-700">Price:</strong>
                    <input type="number" name="price" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12" placeholder="Enter Rupiah "  value="{{ old('price') }}">                
                </div>
                <div class="flex flex-row space-x-4 items-center mb-4">                    
                    <strong class="w-4/12 tracking-wider text-gray-700">Description:</strong>
                    <textarea class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12"  style="height:150px" name="description" placeholder="Enter Description"> {{ old('description') }}</textarea> 
                </div>  

                <div class="flex flex-row space-x-4 items-center mb-4">                    
                    <strong class="w-4/12 tracking-wider text-gray-700">Color / Variant:</strong>

                    <div class="grid grid-cols-4 gap-4">
                        <div class="flex flex-row items-center space-x-2">
                            <input type="checkbox" name="color[]" id="0" value="white" />
                            <label for="0">White</label>
                        </div>
                        <div class="flex flex-row items-center space-x-2">
                            <input type="checkbox" name="color[]" id="1" value="red"/>
                            <label for="1" class="text-red-500">Red</label>
                        </div>
                        <div class="flex flex-row items-center space-x-2">
                            <input type="checkbox" name="color[]" id="2" value="yellow"/>
                            <label for="2" class="text-yellow-500">Yellow</label>
                        </div>
                        <div class="flex flex-row items-center space-x-2">
                            <input type="checkbox" name="color[]" id="3" value="blue"/>
                            <label for="3" class="text-blue-500">Blue</label>
                        </div>
                        <div class="flex flex-row items-center space-x-2">
                            <input type="checkbox" name="color[]" id="4" value="black"/>
                            <label for="4">Black</label>
                        </div>    
                        <div class="flex flex-row items-center space-x-2">
                            <input type="checkbox" name="color[]" id="9" value="gray"/>
                            <label for="9" class="text-gray-700">Gray</label>
                        </div>   
                        <div class="flex flex-row items-center space-x-2">
                            <input type="checkbox" name="color[]" id="10" value="green"/>
                            <label for="10" class="text-green-500">Green</label>
                        </div>   
                        <div class="flex flex-row items-center space-x-2">
                            <input type="checkbox" name="color[]" id="11" value="cyan"/>
                            <label for="11" class="text-cyan-500">Cyan</label>
                        </div>                   
                    </div>  
                </div>
                <div class="flex flex-row space-x-4 items-center mb-4">                    
                    <strong class="w-4/12 tracking-wider text-gray-700">Ingredients:</strong>
                    <input type="text" name="ingredients" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12" placeholder="Enter Ingredients" value="{{ old('ingredients') }}">                    
                </div>
                <div class="flex flex-row space-x-4 items-center mb-4">                    
                    <strong class="w-4/12 tracking-wider text-gray-700">Size:</strong>                    
                    <div class="grid grid-cols-3 gap-4">
                        <div class="flex flex-row items-center space-x-2">
                            <input type="checkbox" name="size[]" id="5" value="s"/>
                            <label for="5">Small</label>
                        </div>
                        <div class="flex flex-row items-center space-x-2">
                            <input type="checkbox" name="size[]" id="12" value="m"/>
                            <label for="12">Medium</label>
                        </div>
                        <div class="flex flex-row items-center space-x-2">
                            <input type="checkbox" name="size[]" id="6" value="l"/>
                            <label for="6">Large</label>
                        </div>
                        <div class="flex flex-row items-center space-x-2">
                            <input type="checkbox" name="size[]" id="7" value="xl"/>
                            <label for="7">Xtra Large</label>
                        </div>
                        <div class="flex flex-row items-center space-x-2">
                            <input type="checkbox" name="size[]" id="8" value="xxl"/>
                            <label for="8">XXL</label>
                        </div>                     
                    </div>            
                </div>
                <div class="flex flex-row space-x-4 items-center mb-4">                    
                    <strong class="w-4/12 tracking-wider text-gray-700">Image:</strong>
                    <input type="file" name="image"  placeholder="image" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12">
                </div>          
                <div class="flex flex-row space-x-4 items-center mb-4">                    
                    <strong class="w-4/12 tracking-wider text-gray-700">Pict:</strong>
                    <div class="grid grid-cols-1 gap-4">
                        <div class="font-semibold  text-md">
                            1. <input type="file" name="pict1"  placeholder="image" class="ml-3 px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 ">
                        </div>
                        <div class="font-semibold  text-md">
                            2. <input type="file" name="pict2"  placeholder="pict2" class="ml-3 px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 ">
                        </div>
                        <div class="font-semibold  text-md">
                            3. <input type="file" name="pict3"  placeholder="image" class="ml-3 px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 ">
                        </div>
                    </div>
                </div>       
                <div class="flex flex-row space-x-4 items-center mb-4">                    
                    <strong class="w-4/12 tracking-wider text-gray-700">Stock:</strong>
                    <input type="number" name="stock" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12" placeholder="Enter stock" value="{{ old('stock') }}">                    
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
<div class="relative rounded-xl overflow-auto border bg-gray-100 mb-6">
    <div class="shadow-sm overflow-hidden my-4">
        <table class="table-auto text-center w-full text-sm ">
            <thead class="border-b-2 rounded-lg text-gray-700">
                <tr >
                    <th class="p-2">No</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th class="w-40 ">Details</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($product as $key => $value)
                <tr class="text-gray-500">
                    <td class="py-3">{{ ++$i }}</td>
                    <td>{{ $value->title }}</td>
                    <td>{{ $value->brand }}</td>
                     <td> @currency($value->price)</td>
                    <td>@if($value->category) {{ $value->category->name }} @endif </td>
                    <td class="py-3">{{ \Str::limit($value->description, 70) }}</td>
                    <td>
                        <form action="{{ route('products.destroy',$value->id) }}" method="POST" 
                            class="flex flex-row space-x-4 items-center font-semibold justify-center py-2">                                 
                            <a href="{{ route('products.edit',$value->id) }}" 
                                class="text-white hover:bg-yellow-500 duration-300 bg-yellow-400 py-2 px-4 rounded-lg tracking-wider">
                                Edit
                            </a>   
                            @csrf
                            @method('DELETE')      
                            <button type="submit" class="text-white hover:bg-red-500 duration-300 bg-red-400 py-2 px-4 rounded-lg tracking-wider font-semibold">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>  
    </div>
</div>
{!! $product->links() !!}      
@endsection