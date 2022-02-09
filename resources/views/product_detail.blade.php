@extends('layouts.guest')
@section('content')
   <div class="w-max-screen text-gray-700">
        <nav  x-data="{open: false , isOpen : false}" 
        class="flex fixed items-center justify-between flex-wrap p-4 md:p-6 px-4 md:px-16 w-screen z-30 top-0 backdrop-blur-sm bg-white/30"
        x-data="{ isOpen: false }"

        @keydown.escape="isOpen = false"
        :class="{ 'bg-white' : isOpen , 'backdrop-blur-sm bg-white/30' : !isOpen}"
        >
        <!--Logo etc-->
        <div class="flex flex-row items-center flex-shrink-0 text-white mr-6">
        <img src="{{asset('images/logo.png')}}" class="object-cover object-center rounded-full w-9 md:w-12">
        <a
        class="text-white no-underline hover:text-white hover:no-underline"
        href="/"
        >         
        <span class="text-xl md:text-2xl pl-2 text-orange-500 font-semibold"
        >SALS <span class="text-gray-700">PROJECT</span></span
        >
            </a>
        </div>

    <!--Toggle button (hidden on large screens)-->
    <button
    @click="isOpen = !isOpen"
    type="button"
    class="block lg:hidden px-2 text-gray-500 hover:text-white focus:outline-none focus:text-white"
    >
    <svg
    class="h-6 w-6 fill-current text-gray-700"
    xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 24 24"
    >
    <path
    x-show="isOpen"
    fill-rule="evenodd"
    clip-rule="evenodd"
    d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"
    />
    <path
    x-show="!isOpen"
    fill-rule="evenodd"
    d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
    />
</svg>
</button>

<!--Menu-->


<div
class="hidden lg:inline-flex w-full flex-grow lg:flex lg:items-center lg:w-auto"

>
<ul x-data="{whenClick:'0'}"
class="pt-6 lg:pt-0 list-reset lg:flex justify-end flex-1 items-center font-semibold tracking-wide"
>
<li class="mr-3">
    <a data-scroll  x-on:click="whenClick = '1'"
    class="inline-block py-2 px-4 no-underline  transition duration-300 ease-in-out  hover:text-yellow-400 " :class="{'border-yellow-500 border-b-2 ' : whenClick == 1}"
    href="{{route('welcome')}}#productNav"
    @click="isOpen = false" 
    >Product
</a>
</li>
<li class="mr-3">
    <a data-scroll x-on:click="whenClick = '2'"  :class="{'border-yellow-500 border-b-2 ' : whenClick == '2'}"
    class="inline-block text-gray-600 no-underline hover:text-yellow-400 transition duration-300 ease-in-out hover:text-underline py-2 px-4"
    href="{{route('welcome')}}#testimonialsNav"
    @click="isOpen = false"
    >Testimonials
</a>
</li>
<li class="mr-3">
    <a data-scroll  x-on:click="whenClick = '3'" :class="{'border-yellow-500 border-b-2 ' : whenClick == '3'}"
    class="inline-block text-gray-600 no-underline hover:text-yellow-400 duration-300 hover:text-underline py-2 px-4"
    href="{{route('welcome')}}#aboutNav"
    @click="isOpen = false"
    >About
</a>
</li>
<li class="mr-3">
    <a data-scroll  x-on:click="whenClick = '4'" :class="{'bg-indigo-500 shadow-lg' : whenClick == '4'}"
    class="inline-block bg-yellow-400 text-white rounded-full px-8 py-2 no-underline hover:text-white duration-300 hover:bg-indigo-400 hover:text-underline "
    href="{{route('welcome')}}#contactNav"
    @click="isOpen = false"
    >CONTACT
</a>
</li>
<li>
    <div class=" text-gray-800 rounded-full flex flex-row items-center" x-data="{ searchTool : false}" > 
     <i class="fas fa-search hover:text-blue-500 duration-300 cursor-pointer text-lg"  x-on:click="searchTool =! searchTool" x-show="!searchTool"></i>
      
     <div x-show="searchTool" x-transition>
          <form action="/productshow" class="flex my-auto relative">   
            <button type="button" class="absolute left-4 inset-y-0">       
                 <i class="fas fa-times text-red-400 hover:text-red-600"  x-on:click="searchTool =! searchTool" x-show="searchTool"></i>
             </button> 
                <input type="text" name="search" class="border bg-gray-200 pl-8 py-2 rounded-full h-full pr-16 active:bg-white focus:outline-none focus:ring focus:ring-blue-300 w-52 tracking-wide w-full" placeholder="Search .." value="{{request('search')}}">     
                <button type="submit"  class="absolute right-0 inset-y-0 border border rounded-r-full text-gray-700 px-4 tracking-wider py-2 rounded-md font-semibold hover:bg-gray-100 duration-300 hover:text-blue-500">
                <i class="fas fa-search"></i>
                </button>
            </form>

     </div>
     </div>
</li>
</ul>
</div>

<!-- mobile -->
<div
class="inline-flex lg:hidden w-full flex-grow lg:flex lg:items-center lg:w-auto"
:class="{ 'block shadow-3xl': isOpen, 'hidden': !isOpen }"
@click.away="isOpen = false"
x-show="isOpen === true"
x-transition
>
<ul x-data="{whenClick:'0'}"
class="pt-6 lg:pt-0 list-reset lg:flex justify-end flex-1 items-center font-semibold tracking-wide"
>
<li class="mr-3">
    <a data-scroll  x-on:click="whenClick = '1'"
    class="inline-block py-2 px-4 no-underline  transition duration-300 ease-in-out  hover:text-yellow-400 " :class="{'border-yellow-500 border-b-2 ' : whenClick == 1}"
    href="{{route('welcome')}}#productNav"
    @click="isOpen = false" 
    >Product
</a>
</li>
<li class="mr-3">
    <a data-scroll x-on:click="whenClick = '2'"  :class="{'border-yellow-500 border-b-2 ' : whenClick == '2'}"
    class="inline-block text-gray-600 no-underline hover:text-yellow-400 transition duration-300 ease-in-out hover:text-underline py-2 px-4"
    href="{{route('welcome')}}#testimonialsNav"
    @click="isOpen = false"
    >Testimonials
</a>
</li>
<li class="mr-3">
    <a data-scroll  x-on:click="whenClick = '3'" :class="{'border-yellow-500 border-b-2 ' : whenClick == '3'}"
    class="inline-block text-gray-600 no-underline hover:text-yellow-400 duration-300 hover:text-underline py-2 px-4"
    href="{{route('welcome')}}#aboutNav"
    @click="isOpen = false"
    >About
</a>
</li>
<li class="mr-3">
    <a data-scroll  x-on:click="whenClick = '4'" :class="{'bg-indigo-500 shadow-lg' : whenClick == '4'}"
    class="inline-block bg-yellow-400 text-white rounded-full px-8 py-2 no-underline hover:text-white duration-300 hover:bg-indigo-400 hover:text-underline "
    href="{{route('welcome')}}#contactNav"
    @click="isOpen = false"
    >CONTACT
</a>
</li>

<li class="mt-4 ">
    <div class=" text-gray-800 rounded-full flex flex-row items-center" x-data="{ searchTool : false}" > 
     <i class="fas fa-search hover:text-blue-500 duration-300 cursor-pointer text-lg ml-4"  x-on:click="searchTool =! searchTool" x-show="!searchTool"></i>
      
     <div x-show="searchTool" x-transition>
          <form action="/productshow" class="flex my-auto relative">   
            <button type="button" class="absolute left-4 inset-y-0">       
                 <i class="fas fa-times text-red-400 hover:text-red-600"  x-on:click="searchTool =! searchTool" x-show="searchTool"></i>
             </button> 
                <input type="text" name="search" class="border bg-gray-200 pl-8 py-2 rounded-full h-full pr-16 active:bg-white focus:outline-none focus:ring focus:ring-blue-300 w-52 tracking-wide" placeholder="Search .." value="{{request('search')}}">     
                <button type="submit"  class="absolute right-0 inset-y-0 border border rounded-r-full text-gray-700 px-4 tracking-wider py-2 rounded-md font-semibold hover:bg-gray-100 duration-300 hover:text-blue-500">
                <i class="fas fa-search"></i>
                </button>
            </form>

     </div>
     </div>
</li>
</ul>
</div>
</nav>




<section class="h-auto sm:px-6 md:pt-28 lg:pt-28 pt-28 md:pb-20 lg:px-20 relative flex flex-col px-6 bg-gray-50" id="productNav">

 <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="showModal1" :class="{ 'fixed inset-0 z-40 flex items-center justify-center': showModal1 }">
        <!--Dialog-->
        <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6 absolute" x-data="{ count: 1 }" x-show="showModal1" @click.away="showModal1 = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">

            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold border-b pb-2">Check out</p>
                <div class="cursor-pointer z-50" @click="showModal1 = false">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                    </svg>
                </div>
            </div>

           
              <div class="flex mt-6 items-center space-x-2">
                    <label class="w-4/12 tracking-wider" for="inputProduct">Product</label>
                    <input
                    class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12"
                    id="inputProduct"
                    name="username"
                    type="text"
                    placeholder="Product" value="{{$product->title}}"/>
                   
                </div>
                @php $count=1; @endphp
                <div class="flex mt-6 items-center space-x-2"  >
                    <label class="w-4/12 tracking-wider" for="inputPassword">Total</label>
                    <div class="relative  px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12">
                        <label
                        class="" 
                        x-text="count">                    
                        </label>
                     
                        <div class="flex flex-row absolute right-0 z-10 inset-y-0 border text-xl ">
                             <button x-on:click="count++" class="w-12 bg-white font-semibold hover:bg-gray-100" >+</button>
                             <button  x-on:click="count--" class="w-12 bg-white font-semibold hover:bg-gray-100 border-l" >-</button>                      
                        </div>
                    </div>
                   
                 
                </div>
               

                <div class="flex justify-end mt-4 pt-4 -mx-4 border-t px-6 space-x-2 bg-gray-50">                   
                    <button class="modal-close px-4 p-3 rounded-lg text-gray-500 hover:bg-gray-200 bg-gray-100 hover:text-gray-600 mr-2 tracking-wider font-semibold" @click="showModal1 = false">Close</button>
                    <button @click="sayHello($data)" class="px-6 bg-blue-400 p-3 rounded-lg text-white hover:bg-blue-500 duration-300 font-semibold tracking-wider" type="submit">Check Out</button>
                </div>
        <script type="text/javascript">
            function sayHello({ count }) {
            location.href='https://wa.me/088805455050?text=Pesan%20Produk%20{{ $product->title }} dengan jumlah '+count
        }
        </script>
        </div>
    </div>

    <div class="h-100 border-4 md:border-8 border-yellow-400 w-2 bg-yellow-400 absolute top-0 bottom-0 ml-24"></div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12" data-aos="flip-left">
        <div class="bg-blue-100 flex flex-col lg:flex-row rounded-xl p-8 relative md:flex-col-reverse justify-end flex-col-reverse bg-paralax your-element md:min-h-[450px] h-[400px]" data-tilt-max="15" data-tilt-speed="5000" data-tilt-max-glare="0.8" data-tilt-scale="1" data-tilt-perspective="600" > 
            <label class="text-5xl left-[30%] md:left-[40%] rotate-90 md:rotate-45 lg:rotate-90 font-semibold md:text-5xl lg:text-6xl absolute text-gray-500 inset-y-4 my-auto md:left-0 lg:left-40 xl:left-80 h-min -z-10 uppercase" >{{ $product->brand }}</label>
             <a href="/productshow?category={{$product->first()->category->slug}}" class="bg-white rounded-lg font-semibold px-4 py-2 absolute top-5 left-5 md:top-10 md:left-10 flex items-center space-x-2 cursor-pointer hover:bg-gray-100 duration-300 md:text-base text-sm">
                <i class="fas fa-tags"></i> 
                <label>{{$product->category->name}}</label>
            </a>
            <div class="md:left-8 lg:left-8 bottom-8 md:bottom-10 absolute grid grid-cols-3 lg:grid-cols-1 gap-4 md:gap-6 lg:gap-8 lg:w-24 w-10/12 place-items-center z-20 my-auto pic-paralax">
                <img src="/image/{{ $product->pict1 }}" class="bg-white/30 backdrop-blur-sm hover:scale-125 duration-300 object-cover h-20 w-20 border rounded-lg p-2 border-gray-50">
                <img src="/image/{{ $product->pict2 }}" class="bg-white/30 backdrop-blur-sm hover:scale-125 duration-300 object-cover h-20 w-20 border rounded-lg p-2 border-gray-50">
                <img src="/image/{{ $product->pict3 }}" class="bg-white/30 backdrop-blur-sm hover:scale-125 duration-300 object-cover h-20 w-20 border rounded-lg p-2 border-gray-50">

            </div>        
            <img src="/image/{{$product->image}}" class=" object-contain z-10 lg:w-100 xl:w-96 min-h-[329px] image-paralax">    

        </div>
        <div class="flex flex-col space-y-6 justify-between py-4 -mt-10 md:mt-0" data-aos="flip-right" data-aos-duration="1000">
            <div class="flex flex-col space-y-0 md:space-y-4">
                <div class="flex flex-col items-start w-100 space-y-2 md:inline-block hidden ">
                    <div class="flex flex-row space-x-2 items-center justify-between">
                     <label class="uppercase text-4xl font-bold">{{ $product->title }}</label>
                     <label class="uppercase bg-purple-500 text-white px-4 py-2 text-sm font-semibold rounded-lg w-max">new arrival</label>
                 </div>
                     <div class="flex flex-row space-x-2 items-center mt-4 justify-between">
                     <label class="font-bold text-2xl  tracking-widest myStroke text-yellow-400">@currency($product->price)</label>
                  
                 </div>
                 
             </div>
             <!--  mobile view -->
             <div class="z-20 md:hidden flex flex-col w-100 pb-4">
                <label class="uppercase text-3xl font-semibold">{{ $product->title }}</label>
                <div class="flex flex-row space-x-2 items-center">
                    <label class="uppercase bg-purple-500 text-white px-4 py-2 text-sm font-semibold rounded-lg w-max">new arrival</label>
                    <label class="font-semibold text-xl myStroke text-yellow-400 tracking-widest">@currency($product->price)</label>
                </div>
            </div>
            <!-- end mobile view -->
            <p class="text-gray-500">{{ \Str::limit($product->description, 150) }}</p>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="flex flex-col space-y-2">
                <label class="text-xl md:text-2xl font-semibold">Ingredients</label>
                <p class="text-gray-500">{{ $product->ingredients }}</p>
            </div>
            <div class="flex flex-col space-y-2">
                <label class="text-xl md:text-2xl font-semibold">Size</label>
                <p class="text-gray-500">
                   @if(strstr("$product->size","xl"))
                   Xtra Large,
                   @endif
                   @if(strstr("$product->size","l"))
                   Large,
                   @endif
                   @if(strstr("$product->size","m"))
                   Medium and
                   @endif
                   @if(strstr("$product->size","s"))
                   Small
                   @endif
               </p>
           </div>
       </div>
       <div class="flex flex-col space-y-2">
         <label class="text-xl md:text-2xl font-semibold text-center">Variant</label>
         <div class="flex lg:space-x-4 xl:space-x-8 mx-auto space-x-4">
           <?php                
                  $my_array =  preg_replace('/\s+/', '',explode(",",$product->color));  
                  
                    ?>

                   @foreach($my_array as $color)
                       
                       <div x-data="{ {{$color}}: false }"  x-on:mouseover="{{$color}} = true"  x-on:mouseleave="{{$color}} = false" class="@if($color=='white') bg-white text-gray-700 border-4 border-gray-700 @elseif($color=='black') text-white bg-gray-800 @else bg-{{ $color }}-400  @endif lg:h-9 lg:w-9 h-6 w-6 rounded-full hover:shadow-lg duration-300 hover:shadow-{{ $color }}-400/50 relative inline-flex">
                          <div class="relative" x-cloak x-show.transition.origin.top="{{$color}}" x-transition>
                              <div class="absolute left-0 top-0 z-10 w-auto p-2 capitalize -mt-1 text-sm leading-tight @if($color=='white') bg-white text-gray-700 @elseif($color=='black') text-white bg-gray-800 @else text-white bg-{{$color}}-500 @endif -translate-y-full  rounded-lg shadow-lg">
                                {{$color}}
                            </div>
                            <svg class="absolute z-10 w-6 h-6 @if($color=='white') text-white @elseif($color=='black') text-gray-800 @else text-{{$color}}-500 @endif transform  -translate-y-3 fill-current stroke-current inset-x-0 mx-auto" width="8" height="8">
                                <rect x="12" y="-10" width="8" height="8" transform="rotate(45)" />
                            </svg>
                        </div>
                       </div>
                                    
                   @endforeach
        </div>
    </div>
    <div class=" pt-0.5 rounded-lg flex space-x-6 items-center justify-center px-2 flex-row  ">
     <button @click="showModal1 = true" class="text-white shadow-lg shadow-yellow-400/50 bg-yellow-400 py-4 px-4 rounded-lg font-semibold text-lg lg:text-2xl lg:w-6/12 w-6/12 hover:bg-yellow-500 duration-300 tracking-wider mx-auto md:mb-0 ">Check Out</button>
     <label class="text-gray-500 w-6/12 font-semibold lg:text-base xl:text-lg tracking-wider" >We Have only {{$product->stock}} pcs</label>
 </div>
</div>
</div>

<div class="flex flex-col lg:flex-row lg:space-y-0 space-y-3 items-start lg:items-center justify-between mt-20 mb-10 ">
     <label class="text-3xl md:text-4xl font-bold tracking-wider z-10 capitalize" data-aos="fade-right">Others Product</label>
     <div class="flex flex-row items-center space-x-4">
              <form action="/productshow" class="flex my-auto relative">          
                <input type="text" name="search" class="border bg-gray-200 pl-3 py-2 rounded-md h-full pr-16 w-full" placeholder="Search .." value="{{request('search')}}">     
                <button type="submit"  class="absolute right-0 inset-y-0 border bg-white border rounded-md text-gray-700 px-5 tracking-wider py-2 rounded-md font-semibold hover:bg-gray-100">
                <i class="fas fa-search"></i>
                </button>
            </form>
               <div x-data="{dropdownMenu: false}" class="relative" @click.away="dropdownMenu = false">
                <!-- Dropdown toggle button -->
                <button @click="dropdownMenu = ! dropdownMenu" class="flex flex-row space-x-2 hover:bg-gray-100 focus:shadow-lg items-center md:py-2 py-3 px-4 md:px-4 bg-white bg-white rounded-md border rounded-lg w-max">
                    <i class="fas fa-sort"></i> <span class="mr-4 hidden md:inline-block">Sorting</span>
                </button>
                <!-- Dropdown list -->
                
                <div x-show="dropdownMenu" class="absolute right-0 py-2 mt-2 bg-white bg-white rounded-md shadow-xl w-44 z-20">
                    <a href="productshow?category={{ request('category') }}&sort=price" class="block px-4 py-2 text-sm text-gray-600 text-gray-700 hover:bg-yellow-400 hover:text-white">
                        Price (Low to High)
                    </a>
                    <a href="productshow?category={{ request('category') }}&sort=title" class="block px-4 py-2 text-sm text-gray-600 text-gray-700 hover:bg-yellow-400 hover:text-white">
                        Name A - Z
                    </a>
                    <a href="productshow?category={{ request('category') }}&sort=brand" class="block px-4 py-2 text-sm text-gray-600 text-gray-700 hover:bg-yellow-400 hover:text-white">
                        Brand A - Z
                    </a>
                    <a href="productshow?category={{ request('category') }}&sort=created_at" class="block px-4 py-2 text-sm text-gray-600 text-gray-700 hover:bg-yellow-400 hover:text-white">
                        Latest Product
                    </a> 

                </div>
            </div>
            <div x-data="{dropdownMenu: false}" class="relative" @click.away="dropdownMenu = false">
                <!-- Dropdown toggle button -->
                <button @click="dropdownMenu = ! dropdownMenu" class="flex flex-row space-x-2 hover:bg-gray-100 focus:shadow-lg items-center md:py-2 py-3 px-3 md:px-4 bg-white bg-white rounded-md border rounded-lg">
                    <i class="fas fa-tags"></i> <span class="mr-4 hidden md:inline-block">Category </span>
                </button>
                <!-- Dropdown list -->
                <div x-show="dropdownMenu" class="absolute right-0 py-2 mt-2 bg-white bg-white rounded-md shadow-xl w-44 z-20">
                    @foreach($category as $data)
                    <a href="/productshow?category={{$data->slug}}" class="block px-4 py-2 text-sm text-gray-600 text-gray-700 hover:bg-yellow-400 hover:text-white">
                        {{$data->name}}
                    </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

<div class="md:grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 md:space-x-0 space-x-6 lg:gap-8 md:gap-10 xl:gap-x-10 xl:gap-y-14 flex md:overflow-y-hidden overflow-x-auto snap-x snap-mandatory pb-8 md:pb-10" data-aos="fade-up" data-aos-duration="1000">
    @foreach ($products->where('id', '!=', $product->id); as $data)
   <a href="/product_detail/{{ $data->id }}" class="bg-white border rounded-lg w-52 md:w-full md:h-80 lg:h-72 h-60 p-4 md:p-6 flex flex-col relative snap-always snap-center shrink-0 justify-between duration-300 hover:shadow-lg hover:border-yellow-300" > 
        <div class="flex-auto relative flex justify-between items-start md:items-center w-full">            
         <div class="flex flex-col space-y-2 w-10 text-left">
            @if(strstr("$data->color","yellow"))  
            <div class="bg-yellow-400 h-3 w-3 rounded-full hover:shadow-lg duration-300 hover:shadow-yellow-400/50"></div>
            @endif
            @if(strstr("$data->color","cyan"))
            <div class="bg-cyan-400 h-3 w-3 rounded-full hover:shadow-lg duration-300 hover:shadow-indigo-400/50"></div>
            @endif
            @if(strstr("$data->color","gray"))
            <div class="bg-gray-400 h-3 w-3 rounded-full hover:shadow-lg duration-300 hover:shadow-gray-400/50"></div>
            @endif
            @if(strstr("$data->color","blue"))
            <div class="bg-blue-400 h-3 w-3 rounded-full hover:shadow-lg duration-300 hover:shadow-blue-400/50"></div>
            @endif
            @if(strstr("$data->color","red"))
            <div class="bg-red-400 h-3 w-3 rounded-full hover:shadow-lg duration-300 hover:shadow-red-400/50"></div>
            @endif
            @if(strstr("$data->color","green"))
            <div class="bg-green-400 h-3 w-3 rounded-full hover:shadow-lg duration-300 hover:shadow-green-400/50"></div>
            @endif
            @if(strstr("$data->color","black"))
            <div class="bg-gray-800 h-3 w-3 rounded-full hover:shadow-lg duration-300 hover:shadow-gray-800/50"></div>     
            @endif
        </div>
        <img src="/image/{{$data->image}}" class="absolute inset-0 m-auto h-40 w-32 md:w-32 xl:w-36 md:h-64 object-contain p-1">
        <div class="flex flex-col text-right self-start text-xs">
            <label class="font-semibold text-sm md:text-md">Size</label>
           @if(strstr("$data->size","xl"))
            <label class="text-gray-500">XL</label>
            @endif
            @if(strstr("$data->size","l"))
            <label class="text-gray-500 hidden md:inline-block">Large</label>
            @endif
            @if(strstr("$data->size","m"))
            <label class="text-gray-500 hidden md:inline-block">Medium</label>
            @endif
            @if(strstr("$data->size","s"))
            <label class="text-gray-500 hidden md:inline-block">Small</label>
            @endif

            @if(strstr("$data->size","l"))
            <label class="text-gray-500 md:hidden inline-block">L</label>
            @endif
            @if(strstr("$data->size","m"))
            <label class="text-gray-500 md:hidden inline-block">M</label>
            @endif
            @if(strstr("$data->size","s"))
            <label class="text-gray-500 md:hidden inline-block">S</label>
            @endif
            
        </div>
    </div>
    <div class="my-4 md:mt-0 flex flex-col text-center">
        <label class="text-xl font-semibold line-clamp-2">{{$data->title}}</label>
        <label class="text-gray-500">{{$data->brand}}</label>           
    </div>
    <label class="absolute -bottom-3 md:-bottom-4 mx-auto inset-x-0 text-2xl md:text-3xl text-yellow-400 font-bold tracking-wider text-center myStroke px-1 w-max leading-none">@currency($data->price)</label>
</a>
@endforeach
</div>
<div class="flex relative items-center text-center mt-8 md:mt-20">
    <label class="md:bg-gray-50 z-10 text-lg md:text-xl font-semibold tracking-wider px-2 mx-auto" data-aos="zoom-in">We Have {{$products->count()-1}} Different Product lets see</label>
    <div class="h-1 w-full bg-gray-700 absolute inset-y-0 my-auto hidden md:inline"></div>
</div>
<a href="{{ route('productshow') }}" class="text-white shadow-lg shadow-yellow-400/50 bg-yellow-400 py-4 px-6 rounded-lg font-semibold text-lg md:text-2xl w-auto lg:w-max md:w-6/12 hover:bg-yellow-500 duration-300 tracking-wider mx-auto mt-8 mb-10 md:mb-0" data-aos="zoom-in" data-aos-duration="1000">See More</a>
</section>

@endsection