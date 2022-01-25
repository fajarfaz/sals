<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SalsProject</title>

    <!-- Fonts -->
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


<body class="antialiased overflow-x-hidden" x-data="{ 'showModal': false }" @keydown.escape="showModal = false" x-cloak>

    <div class="w-max-screen text-gray-700">

       <nav  x-data="{open: false , isOpen : false}" 
       class="flex fixed items-center justify-between flex-wrap p-6 px-4 md:px-16 w-screen z-30 top-0 backdrop-blur-sm bg-white/30"
       x-data="{ isOpen: false }"

       @keydown.escape="isOpen = false"
       :class="{ 'bg-white' : isOpen , 'backdrop-blur-sm bg-white/30' : !isOpen}"
       >
       <!--Logo etc-->
       <div class="flex flex-row items-center flex-shrink-0 text-white mr-6">
        <img src="{{asset('images/logo.png')}}" class="object-cover object-center rounded-full w-12">
        <a
        class="text-white no-underline hover:text-white hover:no-underline"
        href="#"
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
    href="#productNav"
    @click="isOpen = false" 
    >Product
</a>
</li>
<li class="mr-3">
    <a data-scroll x-on:click="whenClick = '2'"  :class="{'border-yellow-500 border-b-2 ' : whenClick == '2'}"
    class="inline-block text-gray-600 no-underline hover:text-yellow-400 transition duration-300 ease-in-out hover:text-underline py-2 px-4"
    href="#testimonialsNav"
    @click="isOpen = false"
    >Testimonials
</a>
</li>
<li class="mr-3">
    <a data-scroll  x-on:click="whenClick = '3'" :class="{'border-yellow-500 border-b-2 ' : whenClick == '3'}"
    class="inline-block text-gray-600 no-underline hover:text-yellow-400 duration-300 hover:text-underline py-2 px-4"
    href="#aboutNav"
    @click="isOpen = false"
    >About
</a>
</li>
<li class="mr-3">
    <a data-scroll  x-on:click="whenClick = '4'" :class="{'bg-indigo-500 shadow-lg' : whenClick == '4'}"
    class="inline-block bg-yellow-400 text-white rounded-full px-8 py-2 no-underline hover:text-white duration-300 hover:bg-indigo-400 hover:text-underline "
    href="#contactNav"
    @click="isOpen = false"
    >CONTACT
</a>
</li>
</ul>
</div>
</nav>


<div style="background: url('{{ asset('images/bg-1.jpg') }}');background-size: cover; " class="lg:h-[1430px] md:h-[1330px] h-[1300px]">   

    <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="showModal" :class="{ 'fixed inset-0 z-40 flex items-center justify-center': showModal }">
        <!--Dialog-->
        <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModal" @click.away="showModal = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">

            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold border-b pb-2">Login Access</p>
                <div class="cursor-pointer z-50" @click="showModal = false">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                    </svg>
                </div>
            </div>

            <form action="{{url('proses_login')}}" method="POST" id="logForm" class="pt-4 px-3">
                {{ csrf_field() }}
                <div class="flex flex-row space-x-4 items-center mb-4">
                    @error('login_gagal')
                    {{-- <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> --}}
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{-- <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span> --}}
                        <span class="alert-inner--text"><strong>Warning!</strong> {{ $message }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @enderror
                    <label class="w-4/12 tracking-wider" for="inputEmailAddress">Username</label>
                    <input
                    class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12"
                    id="inputEmailAddress"
                    name="username"
                    type="text"
                    placeholder="Masukkan Username"/>
                    @if($errors->has('username'))
                    <span class="error">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="flex flex-row space-x-4 items-center">
                    <label class="w-4/12 tracking-wider" for="inputPassword">Password</label>
                    <input
                    class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12"
                    id="inputPassword"
                    type="password"
                    name="password"
                    placeholder="Masukkan Password"/>
                    @if($errors->has('password'))
                    <span class="error">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="flex mt-6 items-center space-x-2">
                    <div class="flex items-center space-x-2">
                        <input class="custom-control-input p-1" id="rememberPasswordCheck" type="checkbox"/>
                        <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                    </div>
                </div>

                


                <div class="flex justify-end mt-4 pt-4 -mx-8 border-t px-6 space-x-2 bg-gray-50">                   
                    <button class="modal-close px-4 p-3 rounded-lg text-gray-500 hover:bg-gray-200 bg-gray-100 hover:text-gray-600 mr-2 tracking-wider font-semibold" @click="showModal = false">Close</button>
                    <button class="px-6 bg-blue-400 p-3 rounded-lg text-white hover:bg-blue-500 duration-300 font-semibold tracking-wider" type="submit" @click="alert('login');">Login</button>
                </div>
            </form>
        </div>
    </div>

    <section class="sm:px-6 lg:p-20 relative flex flex-col md:justify-between h-full" >
       <div class="flex md:flex-row flex-col w-100 mt-24 lg:mt-10">
        <div class="z-20 w-full md:w-7/12 flex flex-col space-y-4 md:space-y-6 lg:space-y-10 md:px-0 lg:px-8 px-5">
            <h1 class="font-bold text-4xl lg:text-5xl xl:text-6xl tracking-widest lg:leading-tight aos-init aos-animate" data-aos="zoom-in-right">Make & Use <br>your own Design</h1>
            <label class="text-xl md:text-2xl lg:text-3xl font-semibold text-gray-500" data-aos="zoom-in" data-aos-duration="1000">be prepared to make <br>the latest 
                <span class="before:block before:absolute before:-inset-1 before:-skew-y-3 before:bg-pink-400 mx-1 relative inline-block">
                    <span class="relative text-white">innovations</span>
                </span>
            on a whim</label>
            <div class="grid lg:grid-cols-2 md:grid-cols-1 grid-cols-2 w-100 gap-8 relative pt-7 md:pt-10 md:gap-8 md:px-6 xl:px-6 lg:px-2 lg:text-xl md:text-base text-sm" data-aos="fade-right">
                <span class="border-2 border-white h-0.5 absolute inset-0 -ml-28 -mt-26 mr-24 "></span>
                <button class=" hover:bg-sky-500 cursor-pointer tracking-wider rounded-lg bg-sky-400 shadow-lg shadow-sky-400/50 text-white lg:px-3 xl:px-6 py-2 px-4 md:py-4 font-semibold duration-300 " >Explore Now</button>
                <button  class="tracking-wider rounded-lg bg-transparent border-2 border-gray-400 text-gray-600 lg:px-3 xl:px-6 py-2 px-4 md:py-4 font-semibold  duration-300 hover:border-white hover:bg-white hover:text-gray-700 hover:shadow-lg">Or Custom</button>
                <span class="border-2 border-white h-0.5 absolute inset-0 -mr-4 md:-mr-8 ml-28 lg:mt-36 md:mt-52 mt-24"></span>
            </div>
        </div>
        <div class="w-auto md:mt-0 mt-28 md:px-0 px-4 md:flex-none flex flex-wrap md:space-x-0 space-x-3 justify-between">
            <div class="border-2 border-white h-max md:w-max w-7/12 md:w-100 p-3 relative" data-aos="fade-down-left"> 
                <img src="image/{{$settings[0]->outfitImage}}"  class="lg:w-[409px] md:w-[300px] lg:h-[632px] md:h-[532px]  object-cover object-center h-52 md:inline hidden">   
                <img src="image/{{$settings[0]->outfitImage}}" style="height: 282px;" class="md:w-[183px] w-full object-cover object-center h-52 md:hidden inline">   
                <label class="absolute -top-10 md:top-24 md:left-auto left-0 md:-right-28 font-semibold md:rotate-90 text-xl w-max md:h-min" >OUTFIT FOR TODAY</label>     
            </div>
             
            
        
              
            <!--  mobile view -->
            <div class="grid grid-cols-1 gap-4 lg:gap-8 xl:gap-12 w-4/12 inline md:hidden">            
             @foreach($outfittoday as $key => $oft)
              @php 
            list($width,$height )  = getimagesize('image/'.$oft->image);         
            @endphp
            <div class="flex flex-col p-2 md:p-4 rounded-lg bg-white text-center h-min" data-aos="flip-left" data-aos-duration="1000">
                <div class="bg-gray-200 rounded-lg  mb-2 relative md:w-100 h-20  lg:h-38 xl:h-44 md:h-28"> 
                    <img src="image/{{ $oft->image }}" class="absolute inset-0 m-auto object-cover object-center p-2 @if($height > $width)  bottom-10 @else bottom-0 @endif">
                </div>
                <label class="text-xs md:text-md font-semibold line-clamp-2 leading-4">{{ $oft->title }}</label>
                <label class="text-xs md:text-sm text-gray-600 pb-2">{{ $oft->brand }}</label>
                <label class="text-xs md:text-xl font-semibold text-yellow-400">@currency($oft->price)</label>
            </div>
            @endforeach

        </div>
        <label class="text-base italic tracking-wider leading-relaxed w-7/12 -mt-40 aos-init aos-animate md:hidden inline" data-aos="zoom-in-right">“ Achieve the dream of building your own brand now with us “</label>
    </div>
</div>
<div class="lg:absolute bottom-0 md:top-44 lg:top-32 lg:space-x-7 xl:space-x-12 justify-between items-center w-100 md:flex hidden lg:px-4">
    <div class="w-4/12 flex flex-row md:space-x-1 lg:space-x-4 items-center justify-between pr-4">
        <label class="text-xl italic tracking-wider leading-relaxed w-8/12" data-aos="zoom-in-right">“ Achieve the dream of building your own brand now with us “</label>
        <button class=" border hover:shadow-lg shadow-gray-400/50 bg-white flex lg:h-16 lg:w-16 h-12 w-12 rounded-full items-center justify-center duration-300 p-4">

            <img src="{{asset('images/btn-left.svg')}}" class="w-12 object-center"></button>
        </div>

        <div class="grid grid-cols-3 gap-4 lg:gap-8 xl:gap-12 w-8/12 ">
            
            @foreach($outfittoday as $key => $oft)
            @php 
            list($width,$height )  = getimagesize('image/'.$oft->image);         
            @endphp
           <div class="flex flex-col p-4  rounded-lg bg-white text-center shadow-lg" data-aos="flip-left">
            <div class="bg-gray-200 rounded-lg w-100 mb-4 relative w-100 lg:h-38 xl:h-44 md:h-28">               
                <img src="image/{{ $oft->image }}" class="absolute inset-0 object-contain object-center m-auto max-h-52 md:p-2 lg:p-4 xl:p-0 @if($height > $width)  bottom-10 @else bottom-0 @endif" >                
            </div>        
            <label class="text-md font-semibold line-clamp-2 leading-5">{{ $oft->title }}</label>
            <label class="text-sm text-gray-600 pb-2">{{ $oft->brand }}</label>
            <label class="md:text-lg lg:text-xl font-semibold text-yellow-400">@currency($oft->price)</label>
        </div>      
      
            @endforeach
       
    </div>
</div>



<div class="lg:mt-64 md:mt-20 h-full relative lg:pb-0 md:pb-44 lg:pb-14 -mb-20 px-4 lg:px-20 md:px-10 mx-0 md:-mx-6 lg:-mx-20 md:mt-0 mt-10" style="background-color: #F5F5F5;">
    <div class=" pt-10 md:pt-20 px-4 mx-0 md:pb-0  md:px-4 lg:px-20 pb-10 lg:-mx-20 md:mx-0 flex snap-x snap-mandatory overflow-x-auto lg:overflow-hidden md:grid md:grid-cols-5 h-auto relative w-100 md:mb-20 md:gap-8 place-items-center md:space-x-0 space-x-6" data-aos="fade-up">
        <img src="{{asset('images/client-1.png')}}" class="snap-always snap-center shrink-0  object-cover h-12 snap-center md:h-8 lg:h-12 xl:h-20 grayscale hover:grayscale-0 duration-300">   
         <img src="{{asset('images/client-5.png')}}" class="snap-always snap-center shrink-0  object-cover h-12 snap-center md:h-8 lg:h-12 xl:h-20 grayscale hover:grayscale-0 duration-300">       
       
        <img src="{{asset('images/client-3.png')}}" class="snap-always snap-center shrink-0  object-cover h-12 snap-center md:h-8 lg:h-12 xl:h-12 grayscale hover:grayscale-0 duration-300">  
        <img src="{{asset('images/client-4.png')}}" class="snap-always snap-center shrink-0  object-cover h-12 snap-center md:h-8 lg:h-12 xl:h-20 grayscale hover:grayscale-0 duration-300">  
       
         <img src="{{asset('images/client-2.png')}}" class="snap-always snap-center shrink-0  object-cover h-12 snap-center md:h-8 lg:h-12 xl:h-20 grayscale hover:grayscale-0 duration-300">  
    </div>
    <div class="mt-6 md:mt-0 mb-3 md:mb-5 lg:mb-10 flex items-center space-x-4 md:space-x-10 w-100 lg:pb-24 overflow-hidden" data-aos="fade-up">
        <label class="font-semibold text-2xl md:text-4xl capitalize w-max ">scope of work</label>
        <span class=" h-1.5 w-100 bg-gradient-to-r from-gray-500 flex-auto rounded-l-lg"></span>
    </div>
    <div class="flex snap-x snap-mandatory overflow-x-auto lg:overflow-hidden md:w-full w-11/12 lg:grid lg:grid-cols-5 xl:gap-8 md:gap-4 absolute z-20 inset-x-0 lg:px-20 md:px-10 px-4 lg:-mt-20 py-2 space-x-4 md:space-x-0 " data-aos="flip-up" data-aos-duration="1000">
        <div x-data="{ plain: false }" x-on:click="plain = ! plain" class="snap-always snap-center shrink-0 backdrop-blur-sm  hover:bg-white w-36 md:w-44 lg:w-full  max-h-full flex md:flex-row flex-col cursor-pointer rounded-xl py-3 px-2 md:px-4 lg:px-6 lg:py-4 items-center md:space-x-2 lg::space-x-4 duration-300 border justify-center" :class="{ 'h-min bg-white' : plain , 'lg:h-40 md:h-32 h-32 bg-white/50' : !plain}" >
            <div class="flex h-full  flex-col space-y-2 text-center md:text-left md:pt-0 pt-1.5">
                <div class="h-12 w-12 md:w-16 md:h-16 p-1 xl:h-16 lg:h-16 lg:w-16 xl:w-16 rounded-full bg-blue-400 flex items-center mx-auto justify-center">
                    <img src="{{asset('images/tshirt.svg')}}" class="w-10/12 md:p-1 p-0">
                </div>
                <label class="text-base xl:text-xl lg:text-base tracking-wide leading-none font-semibold text-center">Plain Clothes</label>
                <div x-show="plain" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" class="flex flex-col flex-row capitalize lg:text-base text-sm">
                    <ul role="list" class="marker:text-sky-400 list-disc pl-5 space-y-1 text-left text-slate-500">
                        <li>kaos & kemeja</li>
                    <li>Jersey</li>
                    <li>jacket </li>              
                    <li>celana </li>
                    <li>topi & beanie hat </li>
                    <li>buff </li>
                    <li>Totebag </li>
                  </ul>                    
                </div>
            </div>            
        </div>
        <div x-data="{ printing: false }" x-on:click="printing = ! printing" class="snap-always snap-center shrink-0 backdrop-blur-sm bg-white/50 hover:bg-white w-36 md:w-44 lg:w-full  max-h-full flex md:flex-row flex-col cursor-pointer rounded-xl py-3 px-2 md:px-4 lg:px-6 lg:py-4 items-center md:space-x-2 lg::space-x-4 duration-300 border justify-center" :class="{ 'h-min bg-white' : printing , 'lg:h-40 md:h-32 h-32' : !printing}" >
            <div class="flex h-full  flex-col space-y-2 text-center md:text-left md:pt-0 pt-1.5">
                <div class="h-12 w-12 md:w-16 md:h-16 p-1 xl:h-16 lg:h-16 lg:w-16 xl:w-16 rounded-full bg-sky-400 flex items-center mx-auto justify-center">
                    <img src="{{asset('images/print.svg')}}" class="w-10/12 md:p-1 p-0 text-gray-700">
                </div>
                <label class="text-base xl:text-xl lg:text-base tracking-wide leading-none font-semibold text-center">Printing Sablon</label>
                <div x-show="printing" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" class="flex flex-col flex-row capitalize lg:text-base text-sm">
                   <ul role="list" class="marker:text-sky-400 list-disc pl-5 space-y-1 text-left text-slate-500">
                    <li>Sublime</li>
                    <li>Bordir</li>
                    <li>DTF (Digital transfer film) </li>              
                    <li>Polyflek </li>        
                   </ul>                    
                </div>
            </div>              
        </div>
        <div x-data="{ sablon: false }" x-on:click="sablon = ! sablon" class="snap-always snap-center shrink-0 backdrop-blur-sm bg-white/50 hover:bg-white w-36 md:w-44 lg:w-full  max-h-full flex md:flex-row flex-col cursor-pointer rounded-xl py-3 px-2 md:px-4 lg:px-6 lg:py-4 items-center md:space-x-2 lg::space-x-4 duration-300 border justify-center" :class="{ 'h-min bg-white' : sablon , 'lg:h-40 md:h-32 h-32' : !sablon}" >
            <div class="flex h-full  flex-col space-y-2 text-center md:text-left md:pt-0 pt-1.5">
                <div class="h-12 w-12 md:w-16 md:h-16 p-1 xl:h-16 lg:h-16 lg:w-16 xl:w-16 rounded-full bg-indigo-400 flex items-center mx-auto justify-center">
                    <img src="{{asset('images/sablon.svg')}}" class="w-11/12 md:p-1 p-0">
                </div>
                <label class="text-base xl:text-xl lg:text-base tracking-wide leading-none font-semibold text-center">Manual Sablon</label>
                <div x-show="sablon" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" class="flex flex-col flex-row capitalize lg:text-base text-sm">
                    <ul role="list" class="marker:text-indigo-400 list-disc pl-5 space-y-1 text-left text-slate-500">
                     <li>Sablon Plastisol</li>
                     <li>Sablon Rubber</li>
                     <li>Sablon Plastik</li>              
                     <li>Sablon Kertas</li>       
                 </ul>                             
                </div>
            </div>            
        </div>
        <div x-data="{ pack: false }" x-on:click="pack = ! pack" class="snap-always snap-center shrink-0 backdrop-blur-sm bg-white/50 hover:bg-white w-36 md:w-44 lg:w-full  max-h-full flex md:flex-row flex-col cursor-pointer rounded-xl py-3 px-2 md:px-4 lg:px-6 lg:py-4 items-center md:space-x-2 lg::space-x-4 duration-300 border justify-center" :class="{ 'h-min bg-white' : pack , 'lg:h-40 md:h-32 h-32' : !pack}" >
            <div class="flex  h-full flex-col space-y-2 text-center md:text-left md:pt-0 pt-1.5">
                <div class="h-12 w-12 md:w-16 md:h-16 p-1 xl:h-16 lg:h-16 lg:w-16 xl:w-16 rounded-full bg-blue-400 flex items-center mx-auto justify-center">
                    <img src="{{asset('images/pack.svg')}}" class="w-11/12 md:p-1 p-0">
                </div>
                <label class="text-base xl:text-xl lg:text-base tracking-wide leading-none font-semibold text-center">Packaging Sablon</label>
                <div x-show="pack" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" class="flex flex-col flex-row capitalize lg:text-base text-sm">
                    <ul role="list" class="marker:text-indigo-400 list-disc pl-5 space-y-1 text-left text-slate-500">
                      <li>Papper lunch</li>
                      <li>Papper bag</li>
                      <li>Papper Bowl</li>              
                      <li>Standing punch craft</li>             
                 </ul>                         
                </div>
            </div>                
        </div>
        <div class="snap-always snap-center shrink-0 backdrop-blur-sm bg-white/50 hover:bg-white duration-300 w-36 md:w-44 lg:w-full lg:h-40 md:h-32 h-32 max-h-full
        flex md:flex-row flex-col cursor-pointer rounded-xl py-3 px-2 md:px-4 lg:px-6 lg:py-4 items-center md:space-x-2 lg::space-x-4 duration-300 border justify-center" >
        <div class="flex h-full  flex-col space-y-2 text-center md:text-left md:pt-0 pt-1.5">
            <div class="h-12 w-12 md:w-16 md:h-16 p-1 xl:h-16 lg:h-16 lg:w-16 xl:w-16 rounded-full bg-green-400 flex items-center mx-auto justify-center">
                <img src="{{asset('images/cup.svg')}}" class="w-9/12 md:p-1 p-0">
            </div>
            <label class="text-base xl:text-xl lg:text-base tracking-wide leading-none font-semibold text-center">Cup glass Sablon</label>
        </div>                 
    </div>
    <div class="snap-center shrink-0 md:hidden inline">
      <div class="shrink-0 w-4 sm:w-48"></div>
  </div>
</div>
</div>
</section>     
</div>
<section class="h-auto sm:px-6 md:pt-10 lg:pt-44 pt-40 md:pb-20 lg:px-20 relative flex flex-col px-4 bg-gray-50" id="productNav">
    <label class="text-4xl md:text-6xl font-bold tracking-wider z-10 md:mt-20 lg:mt-10 md:mb-10 mb-2" data-aos="flip-up">OUR PRODUCT</label>

    <div class="h-100 border-4 md:border-8 border-yellow-400 w-2 bg-yellow-400 absolute top-0 bottom-0 ml-24"></div>
    @if($product->count())
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <div class="bg-blue-100 flex flex-col lg:flex-row rounded-xl p-8 relative md:flex-col-reverse justify-end flex-col-reverse " data-aos="flip-left"> 
            <label class="text-5xl left-[40%] rotate-90 md:rotate-45 lg:rotate-90 font-semibold md:text-5xl lg:text-6xl absolute text-gray-500 inset-y-2 my-auto md:left-0 lg:left-40 xl:left-80 h-min -z-10" >SALSPROJECT</label>
            <div class="md:left-8 lg:left-8 bottom-8 md:bottom-10 absolute grid grid-cols-3 lg:grid-cols-1 gap-4 md:gap-6 lg:gap-8 lg:w-24 w-10/12 place-items-center z-20 my-auto">
                <img src="image/{{ $product[0]->pict1 }}" class="backdrop-grayscale hover:scale-125 duration-300 object-cover h-auto w-auto border rounded-lg p-2 border-gray-50">
                <img src="image/{{ $product[0]->pict2 }}" class="backdrop-grayscale hover:scale-125 duration-300 object-cover h-auto w-auto border rounded-lg p-2 border-gray-50">
                <img src="image/{{ $product[0]->pict3 }}" class="backdrop-grayscale hover:scale-125 duration-300 object-cover h-auto w-auto border rounded-lg p-2 border-gray-50">

            </div>        
            <img src="image/{{$product[0]->image}}" class=" object-contain z-10 lg:w-100 xl:w-96">    

        </div>
        <div class="flex flex-col space-y-6 justify-between py-4 -mt-10 md:mt-0" data-aos="flip-right" data-aos-duration="1000">
            <div class="flex flex-col space-y-0 md:space-y-4">
                <div class="flex flex-col items-start w-100 space-y-2 md:inline-block hidden">
                    <label class="uppercase text-4xl font-bold">{{ $product[0]->title }}</label>
                    <div class="flex flex-row space-x-2 items-center">
                        <label class="uppercase bg-purple-500 text-white px-4 py-2 text-sm font-semibold rounded-lg w-max">new arrival</label>
                        <label class="font-semibold text-xl text-gray-500">@currency($product[0]->price)</label>
                    </div>
                </div>
                <!--  mobile view -->
                <div class="z-20 md:hidden flex flex-col w-100 pb-4">
                    <label class="uppercase text-3xl font-semibold">{{ $product[0]->title }}</label>
                    <div class="flex flex-row space-x-2 items-center">
                        <label class="uppercase bg-purple-500 text-white px-4 py-2 text-sm font-semibold rounded-lg w-max">new arrival</label>
                        <label class="font-semibold text-xl text-gray-500">@currency($product[0]->price)/label>
                    </div>
                </div>
                <!-- end mobile view -->
                <p class="text-gray-500">{{ \Str::limit($product[0]->description, 200) }}</p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="flex flex-col space-y-2">
                    <label class="text-xl md:text-2xl font-semibold">Ingredients</label>
                    <p class="text-gray-500">{{ $product[0]->ingredients }}</p>
                </div>
                <div class="flex flex-col space-y-2">
                    <label class="text-xl md:text-2xl font-semibold">Size</label>
                    
                    <p class="text-gray-500">
                        @if(strstr("$product[0]->size","xl"))
                     Xtra Large,
                     @endif
                     @if(strstr("$product[0]->size","l"))
                     Large,
                     @endif
                     @if(strstr("$product[0]->size","m"))
                     Medium and
                     @endif
                     @if(strstr("$product[0]->size","s"))
                     Small
                     @endif
               </p>
                
                </div>
            </div>
            <div class="flex flex-col space-y-2">
               <label class="text-xl md:text-2xl font-semibold text-center">Variant</label>
               <div class="flex lg:space-x-4 xl:space-x-8 mx-auto space-x-4">
                @if(strstr("$product[0]->color","yellow"))  
                   <div class="bg-yellow-400 lg:h-9 lg:w-9 h-6 w-6 rounded-full hover:shadow-lg duration-300 hover:shadow-yellow-400/50"></div>
                @endif
                @if(strstr("$product[0]->color","cyan"))
                   <div class="bg-cyan-400 lg:h-9 lg:w-9 h-6 w-6 rounded-full hover:shadow-lg duration-300 hover:shadow-indigo-400/50"></div>
                @endif
                @if(strstr("$product[0]->color","gray"))
                   <div class="bg-gray-400 lg:h-9 lg:w-9 h-6 w-6 rounded-full hover:shadow-lg duration-300 hover:shadow-gray-400/50"></div>
                @endif
                @if(strstr("$product[0]->color","blue"))
                   <div class="bg-blue-400 lg:h-9 lg:w-9 h-6 w-6 rounded-full hover:shadow-lg duration-300 hover:shadow-blue-400/50"></div>
                @endif
                @if(strstr("$product[0]->color","red"))
                   <div class="bg-red-400 lg:h-9 lg:w-9 h-6 w-6 rounded-full hover:shadow-lg duration-300 hover:shadow-red-400/50"></div>
                @endif
                @if(strstr("$product[0]->color","green"))
                   <div class="bg-green-400 lg:h-9 lg:w-9 h-6 w-6 rounded-full hover:shadow-lg duration-300 hover:shadow-green-400/50"></div>
                @endif
                @if(strstr("$product[0]->color","black"))
                   <div class="bg-gray-800 lg:h-9 lg:w-9 h-6 w-6 rounded-full hover:shadow-lg duration-300 hover:shadow-gray-800/50"></div>                
                @endif
               </div>
           </div>
           <div class=" pt-0.5 rounded-lg flex space-x-6 items-center justify-center px-2 flex-row  ">
               <button onclick="location.href='https://wa.me/088805455050?text=Pesan%20Produk%20{{ $product[0]->title }}'" class="text-white shadow-lg shadow-yellow-400/50 bg-yellow-400 py-4 px-4 rounded-lg font-semibold text-lg lg:text-2xl lg:w-6/12 w-6/12 hover:bg-yellow-500 duration-300 tracking-wider mx-auto md:mb-0  ">Check Out</button>
               <label class="text-gray-500 w-6/12 font-semibold lg:text-base xl:text-lg tracking-wider" >We Have only 12 pcs</label>
           </div>
       </div>
   </div>
   <label class="text-4xl font-bold tracking-wider z-10 mt-20 mb-10 capitalize" data-aos="fade-right">Others Product</label>
   <div class="md:grid lg:grid-cols-3 md:grid-cols-2 md:space-x-0 space-x-6 lg:gap-8 md:gap-10 xl:gap-20 flex md:overflow-y-hidden overflow-x-auto snap-x snap-mandatory pb-8 md:pb-10">
    @foreach ($product->skip(1) as $data)
    <a href="product_detail/{{ $data->id }}" class="bg-white border rounded-lg w-52 md:w-full md:h-80 lg:h-72 h-60 p-4 md:p-6 flex flex-col relative snap-always snap-center shrink-0 justify-between" data-aos="fade-up" data-aos-duration="{{$data->id}}99"> 
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
           <img src="image/{{$data->image}}" class="absolute inset-0 m-auto h-40 w-32 md:w-40 xl:w-52 md:h-64 object-contain p-1">
           <div class="flex flex-col text-right justify-self-start md:text-sm text-xs">
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
@else
no product
@endif
</div>
<div class="flex relative items-center text-center mt-8 md:mt-20">
    <label class="md:bg-white z-10 text-lg md:text-xl font-semibold tracking-wider px-2 mx-auto" data-aos="zoom-in">We Have 60 Different Product lets see</label>
    <div class="h-1 w-full bg-gray-700 absolute inset-y-0 my-auto hidden md:inline"></div>
</div>
<a href="{{ route('productshow') }}" class="text-white shadow-lg shadow-yellow-400/50 bg-yellow-400 py-4 px-6 rounded-lg font-semibold text-lg md:text-2xl w-auto lg:w-max md:w-6/12 hover:bg-yellow-500 duration-300 tracking-wider mx-auto mt-8 mb-10 md:mb-0" data-aos="zoom-in" data-aos-duration="1000">See More</a>
</section>

<section class="h-auto md:px-6 px-4 lg:p-20  relative flex flex-col bg-yellow-400 md:py-0 py-5">
  <div class="h-100 border-4 md:border-8 border-white w-2 bg-white absolute top-0 bottom-0 ml-24" ></div>

  <label class="text-4xl md:text-6xl  font-bold tracking-wider z-10 mt-4 md:mt-10 mb-8 md:mb-16 text-center" data-aos="flip-up">
    BEST OFFERS
</label>

<img src="image/{{$settings[0]->promo}}" class="object-contain z-10 aos-init aos-animate lg:pb-0 md:pb-10" data-aos="flip-down">

</section>

<section class="h-auto sm:px-6 md:pb-40 lg:p-20 relative flex flex-col px-4" id="aboutNav">
  <label class="text-4xl md:text-6xl font-bold tracking-wider z-10 mt-10 mb-2 md:mb-4 text-center" data-aos="fade-down">
     ABOUT US
 </label>
 <label class="text-center text-gray-500 font-semibold md:text-2xl tracking-wider md:text-xl text-base" data-aos="fade-up">We Have 60 Different Product lets see</label>
 <div class="grid grid-rows-1 md:grid-cols-2 grid-rows-2 gap-4 mt-10 md:mt-20 relative" >
    <div class="relative inline-block h-full row-span-2 border-white " style=" border-left: 8rem solid #ffffff;">
        <div class="z-10 absolute top-0 left-0 rotate-90 my-auto p-2" style="transform-origin: 0 0;">
            <label class="text-7xl  font-bold text-gray-400" data-aos="fade-left">SALSPROJECT</label>
            <label class="text-gray-700 font-semibold text-3xl" data-aos="fade-left" data-aos-duration="1500">4 Years Experience</label>
        </div>
        <img src="{{asset('images/about-left.jpg')}}" class="bg-red-400 object-cover h-full " data-aos="zoom-in">
    </div>
    <img src="{{asset('images/about-right.jpg')}}" class="bg-yellow-400 h-full object-cover hidden md:inline" data-aos="zoom-in"  data-aos-duration="1500">

    <label class="font-semibold text-sm lg:text-base xl:text-xl text-gray-500 px-6 tracking-wider leading-loose z-10 pt-4 md:pt-14 md:bg-transparent md:backdrop-blur-none backdrop-blur-sm md:bg-transparent bg-white/50 first-line:uppercase first-line:tracking-widest first-letter:text-7xl first-letter:font-bold first-letter:text-slate-900 first-letter:mr-3 first-letter:float-left"  data-aos="zoom-in"  data-aos-duration="1000">
       We are a company engaged in the fashion industry, established in 2018. We
       producing t-shirts, polo shirts, shirts, jackets and jerseys for promotional t-shirts, t-shirts
       tourism, office uniforms, work uniforms, t-shirts for the community, outbound t-shirts etc.<br><br>
       <p>
       And supported by professional and experienced screen printing personnel in their field. We got
       working on various types of manual screen printing variations (basic waterbase and basic oilbase) with
       various kinds of blocking/vector screen printing techniques, color separation.</p>

    </label>
<div class="z-0 hidden  absolute inset-0 md:top-0 m-auto h-32 md:h-48 w-32 md:w-48 rounded-full md:flex flex-col bg-white font-semibold text-xl md:text-3xl justify-center items-center">
 <label class="text-yellow-400">SALS</label>
 <label>PROJECT</label>
</div>
<span class="z-0 hidden md:absolute bottom-0 left-0 h-48 w-48 rounded-full -ml-20 -mb-20 flex flex-col bg-white font-semibold text-3xl justify-center items-center"></span>
</div>

<label class="font-semibold text-2xl md:text-4xl mt-10 md:mt-20 mb-0 md:mb-4 lg:mb-10 border-b-2 pb-2 md:px-0 px-4 " data-aos="fade-up">Finished Project</label>
@php
$array = explode(',', $settings[0]->finishproject);
@endphp

<div class="grid grid-cols-4 gap-2 md:gap-4 px-4 md:px-10 text-xl md:text-3xl lg:text-5xl text-gray-600 leading-none">
    <div class="flex flex-col font-bold " >
        <label class="font-medium text-lg lg:text-4xl md:text-2xl">Clothes</label>
        <label>+ <span class="count">{{$array[0]}} </span></label>
    </div>
    <div class="flex flex-col font-bold " >
        <label class="font-medium text-lg lg:text-4xl md:text-2xl">Papper</label>
        <label>+ <span class="count">{{$array[1]}} </span></label>
    </div>
    <div class="flex flex-col font-bold " >
        <label class="font-medium text-lg lg:text-4xl md:text-2xl">Plastic Cup</label>
        <label>+ <span class="count">{{$array[2]}}  </span></label>
    </div>
    <div class="flex flex-col font-bold " id="testimonialsNav">
        <label class="font-medium text-lg lg:text-4xl md:text-2xl">Packaging</label>
        <label>+ <span class="count">{{$array[3]}}  </span></label>
    </div>
</div>
</section>

<section class="h-auto sm:px-6 lg:p-20 relative flex flex-col md:pt-0 pt-20 " >
    <div class="bg-gray-200 rounded-2xl p-10 md:p-16 relative text-center" >
        <label class="text-4xl md:text-6xl font-bold tracking-wider z-10 absolute -top-5 md:-top-8 inset-x-0 mx-auto underline decoration-wavy decoration-sky-500" data-aos="flip-left">Testimonials</label>
        <label class="font-semibold text-base md:text-xl text-gray-500">“ Startup Institute used their business model to create a unique aials as “</label>

        <div class="flex snap-x snap-mandatory overflow-x-auto md:grid md:grid-cols-2 lg:grid-cols-3 lg:mt-1 md:gap-x-12 md:gap-y-28 gap-6 pt-12 mt-4 lg:gap-8 xl:gap-12">
            @foreach($testimonials as $testimonial)
            <div class="flex flex-col space-y-4 bg-white p-4 md:p-8 rounded-lg snap-center snap-always" data-aos="flip-up" data-aos-duration="1000">            
                <div class="md:h-32 h-24 md:w-full w-36 bg-yellow-400 relative rounded-[20px] rounded-tl-[70px] " >
                    <img src="image/{{$testimonial->photo}}" class="object-contain absolute inset-x-0 mx-auto bottom-0 md:w-52 w-32"></div>
                    <label class="text-gray-600 italic xl:text-base lg:text-sm text-xs">
                        {{$testimonial->testimonial}}
                    </label>
                    <div class="flex flex-row space-x-2 mx-auto">
                        @for($i=0;$i< $testimonial->star; $i++)
                        <img src="{{asset('images/star.svg')}}" class="object-contain w-4 h-4">
                        @endfor
                    </div>
                    <div class="flex flex-col">
                        <label class="font-semibold text-lg md:text-xl">{{$testimonial->name}}</label>
                        <label class="font-semibold text-sm lg:text-base xl:text-lg text-gray-500">{{$testimonial->job}}</label>
                    </div>
                </div>
            @endforeach
                   
                </div>
            </div>
    </section>

            <section class="h-auto sm:px-6 lg:p-20 md:px-12 relative flex flex-col grid md:grid-cols-1 lg:grid-cols-2 gap-20 md:mt-20 md:text-center px-4" id="contactNav">
                <div class="relative lg:inline md:hidden">
                    <div class="md:inline-block absolute hidden top-14 xl:w-full lg:w-96 h-full border-2 border-yellow-400 -z-10 left-10" style="border-radius: 0px 200px 0px 0px; " data-aos="fade-left" data-aos-duration="1000"></div>
                    <img src="{{asset('images/about-bottom.jpg')}}" class="z-10 h-full object-cover md:inline hidden" style="border-radius: 0px 200px 0px 0px;" data-aos="fade-left">
                    <label class="hidden md:absolute -bottom-12 tracking-wider right-0 italic font-semibold text-2xl">Est. 2015</label>
                </div>
                <div class="flex flex-col justify-between" >
                    <div class="flex flex-col space-y-2" data-aos="fade-right">
                       <label class="text-4xl md:text-6xl font-bold tracking-wider " >Contact US</label>
                       <label class="text-gray-500 text-base md:text-xl mt-3">“ Startup Institute used their business model "</label>  
                   </div>               
                   <div class="md:mt-10 mt-10 p-5 bg-gray-100 rounded-full mx-auto h-40 w-40 flex justify-center items-center" data-aos="fade-up">
                     <img src="{{asset('images/logo.png')}}" class="object-cover object-center rounded-full w-28">
                 </div>
                 <div class="flex flex-col text-white bg-gray-700 rounded-xl p-6 tracking-wider mt-8" data-aos="fade-down">
                    <label class="font-semibold text-yellow-400 text-2xl text-center">SALS <span class="text-white">PROJECT</span></label>
                    <div class="grid grid-cols-2 gap-4 mt-4">
                        <div class="flex flex-col space-y-1">
                            <label class="font-semibold ">SHOP 1</label>
                            <div class="flex flex-col border-l border-l border-red-400 pl-2 xl:text-base lg:text-sm">
                                <label>Kucur, Dau, Malang ID</label>
                                <label>Ferry - 08542413123</label>
                            </div>
                        </div>
                        <div class="flex flex-col space-y-1 ">
                            <label class="font-semibold ">SHOP 2</label>
                            <div class="flex flex-col border-l border-l border-red-400 pl-2 xl:text-base lg:text-sm">
                                <label>Pendem, Dau, Malang ID</label>
                                <label>Ferry - 08542413123</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col text-white rounded-xl px-6 py-4 w-full text-center">                   
                    <button class="text-white shadow-lg shadow-yellow-400/50 bg-yellow-400 py-4 px-6 rounded-lg font-semibold text-base md:text-xl w-full md:w-6/12 hover:bg-yellow-500 duration-300 tracking-wider mx-auto mt-4" data-aos="zoom-in" onclick="sendMail(); return false">Mail us</button>
                </div>
            </div>


        </section>
        <div class="mt-20">
            <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1ikh5t6MYmD5sQODw3kKyQsXcHduOADxo&ehbc=2E312F" width="100%" height="480"></iframe>
        </div>

        <div class="w-full  grid grid-cols-2 md:grid-cols-5 px-12 lg:text-base xl:text-lg gap-10 relative"  style="background: url('{{ asset('images/bg-2.jpg') }}');background-size: cover; height: 342.44px;" >
            <div class="col-span-2 h-full backdrop-blur-sm bg-white/30 relative hidden py-8 px-8 md:flex flex-col lg:text-sm xl:text-base ">           
                <div class="flex flex-row space-x-2 items-center pb-5">
                <img src="{{asset('images/logo.png')}}" class="object-contain object-contain rounded-full h-12 w-12"> 
                <label class="font-bold text-2xl  uppercase text-orange-400 tracking-widest">Sals<span class="text-gray-700">Project</span></label> 
                </div>
                <label class="text-gray-500  "> We are a company engaged in the fashion industry, established in 2018. We
       producing t-shirts, polo shirts, shirts, jackets and jerseys for promotional t-shirts, t-shirts
       tourism, office uniforms, work uniforms, t-shirts for the community, outbound t-shirts etc.
                </label>        
                <label class="italic text-gray-600 pt-1 text-sm">Kucur, Dau, Malang ID</label>
            </div>
            <div class="flex flex-col space-y-2 py-8 ">
                <label class="font-semibold mb-4">MEDIA</label>
                <a href="https://www.instagram.com/salsproject_id/" class="hover:text-blue-500 duration-300">Instagram</a>
                <a href="#" class="hover:text-blue-500 duration-300">Facebook</a>
                <a href="https://www.tiktok.com/@salsproject_id" class="hover:text-blue-500 duration-300">Tiktok</a>
                <a href="#" class="hover:text-blue-500 duration-300">Lazada</a>
                <a href="#" class="hover:text-blue-500 duration-300">Shoopee</a>
            </div>
            <div class="flex flex-col space-y-2 py-8">
                <label class="font-semibold mb-4">COLLABORATION</label>
                <label>Kedai Bunga</label>
                <label>Karang Taruna Kucur</label>
                <label>Desa Kucur</label>
                <label>Omah Bunga</label>
                <label>Souleater</label>
            </div>
            <div class="hidden md:flex flex-col space-y-2 py-8 text-sm">
                <label class="font-semibold mb-4 text-lg">CONTACT</label>
                <label class="font-semibold">Phone</label>
                <label>+62 858-9500-1485 - Ferry </label>
                <br>
                <label class="font-semibold">Mail</label>
                <label>ferrykrmdhn@gmail.com</label>  
                <br>            
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

    </div>

</div>

<script type="text/javascript">
    function sendMail() {
      window.location = "mailto:xyz@yourapplicationdomain.com";
}
</script>
<script type="text/javascript">
    $('.count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

</script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    var scroll = new SmoothScroll('a[href*="#"]', {
        speed: 300
    });
    AOS.init();
</script>
</body>
</html>
