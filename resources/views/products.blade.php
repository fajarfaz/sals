<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Our Products</title>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

<section class="h-auto sm:px-6 md:pt-10 lg:pt-20 pt-20 md:pb-20 md:px-20 relative flex flex-col px-6 bg-gray-50" id="productNav"
 x-data="citySearch()">
	<div class="h-100 border-4 md:border-8 border-yellow-400 w-2 bg-yellow-400 absolute top-0 bottom-0 ml-24"></div>
	<div class="flex flex-col lg:flex-row justify-between items-start md:items-center mt-8 md:mt-20 mb-16 md:mb-10 space-y-4 lg:space-y-0">
	<label class="md:text-5xl text-4xl font-bold tracking-wider z-10 capitalize" data-aos="fade-right">Our Best Products</label>
	<div class="flex flex-row justify-between items-center space-x-4" data-aos="fade-up">
		<div class="relative">
		<input type="text" class="placeholder:italic placeholder:text-slate-400 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-400 hover:border-sky-400 focus:ring-1  z-10 border pl-4 pr-10 py-2 rounded-lg text-sm duration-300" id="myInput" onkeyup="myFunction()" placeholder="Search product name.." title="Type in a name">
		<i class="fas fa-search absolute right-4 top-3 text-center text-gray-400"></i>
		</div>
		<div x-data="{dropdownMenu: false}" class="relative" @click.away="dropdownMenu = false">
    <!-- Dropdown toggle button -->
    <button @click="dropdownMenu = ! dropdownMenu" class="flex flex-row space-x-2 hover:bg-gray-100 focus:shadow-lg items-center md:py-2 py-2.5 px-3 md:px-4 bg-white bg-white rounded-md border rounded-lg">
        <i class="fas fa-sort"></i> <span class="mr-4 hidden md:inline-block">Sorting </span>
    </button>
    <!-- Dropdown list -->
    <div x-show="dropdownMenu" class="absolute right-0 py-2 mt-2 bg-white bg-white rounded-md shadow-xl w-44 z-20">
        <a href="/productshow/sort=price" class="block px-4 py-2 text-sm text-gray-600 text-gray-700 hover:bg-yellow-400 hover:text-white">
            Price (Low to High)
        </a>
          <a href="/productshow/sort=price" class="block px-4 py-2 text-sm text-gray-600 text-gray-700 hover:bg-yellow-400 hover:text-white">
            Name A - Z
        </a>
        <a href="/productshow/sort=brand" class="block px-4 py-2 text-sm text-gray-600 text-gray-700 hover:bg-yellow-400 hover:text-white">
            Brand A - Z
        </a>
        <a href="/productshow/sort=title" class="block px-4 py-2 text-sm text-gray-600 text-gray-700 hover:bg-yellow-400 hover:text-white">
            Latest Product
        </a> 
        
    </div>
</div>
	
	</div>
	</div>	
		<!-- <div class="relative">
		<input type="search" class="form-control z-10" placeholder="Enter Keyword here" x-model="search" value=""> 
		<button
		x-show="search.length > 0"
		@click="search = ''"
		class="absolute right-0 top-0 w-6 h-full flex justify-center items-center focus:outline-none text-gray-700 focus:text-gray-900"
		>
				<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
			</button>
		</div> -->
		<!-- @php
		$array = [];
		foreach($searching as $item){
			$array [] = $item->title;
		}
		$productJson = json_encode(['cities' => $array]);

		@endphp -->
	
		<!-- <ul class="list-group mt-3">
			<template x-for="city in filteredCities()" :key="city">
				<li x-html="highlightSearch(city)"></li>
			</template>
		</ul> -->

	<div class="md:grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 md:space-x-0 space-x-6 lg:gap-8 md:gap-10 xl:gap-x-10 xl:gap-y-14 flex md:overflow-y-hidden overflow-x-auto snap-x snap-mandatory pb-8 md:pb-10" id="myUL">
		@foreach ($products->sortBy($sort) as $data)
		<li class="list-none" data-aos="fade-up" data-aos-duration="{{$data->id}}50">
		<a href="/product_detail/{{ $data->id }}" class="bg-white border rounded-lg w-52 md:w-full md:h-80 lg:h-72 h-60 p-4 md:p-6 flex flex-col relative snap-always snap-center shrink-0 justify-between duration-300 hover:shadow-lg hover:border-yellow-300"  > 
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
			<label class="absolute -bottom-3 md:-bottom-4 mx-auto inset-x-0 text-2xl md:text-3xl text-white font-bold tracking-wider text-center px-1 w-max leading-none myStroke text-yellow-400">@currency($data->price)</label>
				
		</a>
	</li>
		@endforeach
	</div>
	<div class="z-10 border-t-2 py-8 text-lg">

	{{ $products->appends(['sort' => 'products'])->links() }}
	</div>

	

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

<script>
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script type="text/javascript">
	function citySearch() {
		var cities = {!! json_encode($array) !!}
  return {
  	cities,
    
    search: '',
    filteredCities() {
      return this.cities.filter(
        city => city.toLowerCase().includes(this.search.toLowerCase())
      );
    },
    highlightSearch(s) {
      if (this.search === '') return s;
      
      return s.replaceAll(
          new RegExp(`(${this.search.toLowerCase()})`, 'ig'),
          '<strong class="font-semibold bg-blue-200">$1</strong>'
      )
    }
  }
}
</script>
<script>


	var scroll = new SmoothScroll('a[href*="#"]', {
		speed: 300
	});
	AOS.init();
</script>
</body>
</html>