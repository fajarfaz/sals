<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Detail</title>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<script src="https://cdn.tailwindcss.com"></script>
	<!-- Styles -->

	<script
	src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js"
	defer
	></script> 

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@15/dist/smooth-scroll.polyfills.min.js"></script>

	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

		body {
			font-family: 'Poppins', sans-serif;
		}
		body[data-aos-duration='4000'] [data-aos], [data-aos][data-aos][data-aos-duration='4000']{
			transition-duration: 4000ms;

		}
		[x-cloak] {
			display: none;
		}

		.duration-300 {
			transition-duration: 300ms;
		}

		.ease-in {
			transition-timing-function: cubic-bezier(0.4, 0, 1, 1);
		}

		.ease-out {
			transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
		}

		.scale-90 {
			transform: scale(.9);
		}

		.scale-100 {
			transform: scale(1);
		}
	</style>

</head>
<body>
    <div class="w-max-screen text-gray-700">

     <nav  x-data="{open: false , isOpen : false}" 
     class="flex fixed items-center justify-between flex-wrap p-6 px-4 md:px-16 w-screen z-30 top-0 backdrop-blur-sm bg-white/30"
     x-data="{ isOpen: false }"

     @keydown.escape="isOpen = false"
     :class="{ 'bg-white' : isOpen , 'backdrop-blur-sm bg-white/30' : !isOpen}"
     >
     <!--Logo etc-->
     <div class="flex items-center flex-shrink-0 text-white mr-6">
        <a
        class="text-white no-underline hover:text-white hover:no-underline"
        href="{{route('welcome')}}"
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
class="w-full flex-grow lg:flex lg:items-center lg:w-auto"
:class="{ 'block shadow-3xl': isOpen, 'hidden': !isOpen }"
@click.away="isOpen = false"
x-show.transition="true"
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
</ul>
</div>
</nav>

<section class="h-auto sm:px-6 md:pt-10 lg:pt-28 pt-28 md:pb-20 lg:px-20 relative flex flex-col px-4 bg-gray-50" id="productNav">


    <div class="h-100 border-4 md:border-8 border-yellow-400 w-2 bg-yellow-400 absolute top-0 bottom-0 ml-24"></div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <div class="bg-blue-100 flex flex-col lg:flex-row rounded-xl p-8 relative md:flex-col-reverse justify-end flex-col-reverse " data-aos="flip-left"> 
            <label class="text-5xl left-[40%] rotate-90 md:rotate-45 lg:rotate-90 font-semibold md:text-5xl lg:text-6xl absolute text-gray-500 inset-y-2 my-auto md:left-0 lg:left-40 xl:left-80 h-min -z-10" >SALSPROJECT</label>
            <div class="md:left-8 lg:left-8 bottom-8 md:bottom-10 absolute grid grid-cols-3 lg:grid-cols-1 gap-4 md:gap-6 lg:gap-8 lg:w-24 w-10/12 place-items-center z-20 my-auto">
                <img src="/image/{{ $product->pict1 }}" class="backdrop-grayscale hover:scale-125 duration-300 object-cover h-auto w-auto border rounded-lg p-2 border-gray-50">
                <img src="/image/{{ $product->pict2 }}" class="backdrop-grayscale hover:scale-125 duration-300 object-cover h-auto w-auto border rounded-lg p-2 border-gray-50">
                <img src="/image/{{ $product->pict3 }}" class="backdrop-grayscale hover:scale-125 duration-300 object-cover h-auto w-auto border rounded-lg p-2 border-gray-50">

            </div>        
            <img src="/image/{{$product->image}}" class=" object-contain z-10 lg:w-100 xl:w-96">    

        </div>
        <div class="flex flex-col space-y-6 justify-between py-4 -mt-10 md:mt-0" data-aos="flip-right" data-aos-duration="1000">
            <div class="flex flex-col space-y-0 md:space-y-4">
                <div class="flex flex-col items-start w-100 space-y-2 md:inline-block hidden ">
                    <div class="flex flex-row space-x-2 items-center justify-between">
                     <label class="uppercase text-4xl font-bold">{{ $product->title }}</label>
                     <label class="uppercase bg-purple-500 text-white px-4 py-2 text-sm font-semibold rounded-lg w-max">new arrival</label>
                 </div>
                     <div class="flex flex-row space-x-2 items-center mt-4 justify-between">
                     <label class="font-bold text-2xl text-gray-500 tracking-wider">@currency($product->price)</label>
                  
                 </div>
                 
             </div>
             <!--  mobile view -->
             <div class="z-20 md:hidden flex flex-col w-100 pb-4">
                <label class="uppercase text-3xl font-semibold">{{ $product->title }}</label>
                <div class="flex flex-row space-x-2 items-center">
                    <label class="uppercase bg-purple-500 text-white px-4 py-2 text-sm font-semibold rounded-lg w-max">new arrival</label>
                    <label class="font-semibold text-xl text-gray-500">@currency($product->price)</label>
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
            @if(strstr("$product->color","yellow"))  
            <div class="bg-yellow-400 lg:h-9 lg:w-9 h-6 w-6 rounded-full hover:shadow-lg duration-300 hover:shadow-yellow-400/50"></div>
            @endif
            @if(strstr("$product->color","cyan"))
            <div class="bg-cyan-400 lg:h-9 lg:w-9 h-6 w-6 rounded-full hover:shadow-lg duration-300 hover:shadow-indigo-400/50"></div>
            @endif
            @if(strstr("$product->color","gray"))
            <div class="bg-gray-400 lg:h-9 lg:w-9 h-6 w-6 rounded-full hover:shadow-lg duration-300 hover:shadow-gray-400/50"></div>
            @endif
            @if(strstr("$product->color","blue"))
            <div class="bg-blue-400 lg:h-9 lg:w-9 h-6 w-6 rounded-full hover:shadow-lg duration-300 hover:shadow-blue-400/50"></div>
            @endif
            @if(strstr("$product->color","red"))
            <div class="bg-red-400 lg:h-9 lg:w-9 h-6 w-6 rounded-full hover:shadow-lg duration-300 hover:shadow-red-400/50"></div>
            @endif
            @if(strstr("$product->color","green"))
            <div class="bg-green-400 lg:h-9 lg:w-9 h-6 w-6 rounded-full hover:shadow-lg duration-300 hover:shadow-green-400/50"></div>
            @endif
            @if(strstr("$product->color","black"))
            <div class="bg-gray-800 lg:h-9 lg:w-9 h-6 w-6 rounded-full hover:shadow-lg duration-300 hover:shadow-gray-800/50"></div>                
            @endif
        </div>
    </div>
    <div class=" pt-0.5 rounded-lg flex space-x-6 items-center justify-center px-2 flex-row  ">
     <button onclick="location.href='https://wa.me/088805455050?text=Pesan%20Produk%20ini'" class="text-white shadow-lg shadow-yellow-400/50 bg-yellow-400 py-4 px-4 rounded-lg font-semibold text-lg lg:text-2xl lg:w-6/12 w-6/12 hover:bg-yellow-500 duration-300 tracking-wider mx-auto md:mb-0 ">Check Out</button>
     <label class="text-gray-500 w-6/12 font-semibold lg:text-base xl:text-lg tracking-wider" >We Have only 12 pcs</label>
 </div>
</div>
</div>
<label class="text-4xl font-bold tracking-wider z-10 mt-20 mb-10 capitalize" data-aos="fade-right">Others Product</label>
<div class="md:grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 md:space-x-0 space-x-6 lg:gap-8 md:gap-10 xl:gap-x-10 xl:gap-y-14 flex md:overflow-y-hidden overflow-x-auto snap-x snap-mandatory pb-8 md:pb-10">
    @foreach ($products as $data)
   <a href="/product_detail/{{ $data->id }}" class="bg-white border rounded-lg w-52 md:w-full md:h-80 lg:h-72 h-60 p-4 md:p-6 flex flex-col relative snap-always snap-center shrink-0 justify-between" data-aos="fade-up" data-aos-duration="{{$data->id}}99"> 
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
        <label class="text-gray-500">Salsproject</label>           
    </div>
    <label class="absolute -bottom-3 md:-bottom-4 mx-auto inset-x-0 text-2xl md:text-3xl text-yellow-400 font-bold tracking-wider text-center bg-white px-1 w-max leading-none">@currency($data->price)</label>
</a>
@endforeach
</div>
<div class="flex relative items-center text-center mt-8 md:mt-20">
    <label class="md:bg-white z-10 text-lg md:text-xl font-semibold tracking-wider px-2 mx-auto" data-aos="zoom-in">We Have 60 Different Product lets see</label>
    <div class="h-1 w-full bg-gray-700 absolute inset-y-0 my-auto hidden md:inline"></div>
</div>
<button class="text-white shadow-lg shadow-yellow-400/50 bg-yellow-400 py-4 px-6 rounded-lg font-semibold text-lg md:text-2xl w-auto lg:w-max md:w-6/12 hover:bg-yellow-500 duration-300 tracking-wider mx-auto mt-8 mb-10 md:mb-0" data-aos="zoom-in" data-aos-duration="1000">See More</button>
</section>

<div class="w-full  grid grid-cols-2 md:grid-cols-5 px-12 lg:text-base xl:text-lg gap-10 relative"  style="background: url('{{ asset('images/bg-2.jpg') }}');background-size: cover; height: 342.44px;" >
    <div class="col-span-2 h-full backdrop-blur-sm bg-white/30 relative hidden py-8 px-8 md:flex flex-col lg:text-sm xl:text-base ">            
        <label class="font-bold text-2xl pb-8 uppercase text-orange-400 tracking-widest">Sals<span class="text-gray-700">Project</span></label> 
        <label class="text-gray-500  ">Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk</label>        
        <label class="italic text-gray-600 pt-3">Kucur, Dau, Malang ID</label>
    </div>
    <div class="flex flex-col space-y-2 py-8 ">
        <label class="font-semibold mb-4">MEDIA</label>
        <label>Amarta</label>
        <label>Landspace</label>
        <label>Distrotion</label>
        <label>NorweD</label>
        <label>Souleater</label>
    </div>
    <div class="flex flex-col space-y-2 py-8">
        <label class="font-semibold mb-4">COLLABORATION</label>
        <label>Amarta</label>
        <label>Landspace</label>
        <label>Distrotion</label>
        <label>NorweD</label>
        <label>Souleater</label>
    </div>
    <div class="hidden md:flex flex-col space-y-2 py-8 ">
        <label class="font-semibold mb-4">CONTACT</label>
        <label>Amarta</label>
        <label>Landspace</label>
        <label>Distrotion</label>
        <label>NorweD</label>
        <button type="button" @click="showModal = true" class="text-left">login</button>
    </div>
    <div class="w-full bg-white h-14 absolute bottom-0 flex items-center justify-center  lg:text-sm xl:text-base font-semibold tracking-widest">
        Copyright 2021

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

    </div>
</div>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    var scroll = new SmoothScroll('a[href*="#"]', {
        speed: 300
    });
    AOS.init();
</script>
</body>
</html>