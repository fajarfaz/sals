<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<script src="https://cdn.tailwindcss.com"></script>
	<!-- Styles -->

	<script
	src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js"
	defer
	></script>   

	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

		body {
			font-family: 'Poppins', sans-serif;
		}
		
	</style>
</head>
<body class="overflow-x-hidden">

	<nav  x-data="{open: false , isOpen : false}" 
	class="flex sticky items-center justify-between flex-wrap p-3 px-4 md:px-9 w-screen z-20 top-0 backdrop-blur-sm bg-white/30 border-b text-sm"
	x-data="{ isOpen: false }"

	@keydown.escape="isOpen = false"
	:class="{ 'bg-white' : isOpen , 'backdrop-blur-sm bg-white/30' : !isOpen}"
	>
	<!--Logo etc-->
	<div class="flex items-center flex-shrink-0 text-white mr-6">
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
	class="md:hidden inline-block py-2 px-4 no-underline  transition duration-300 ease-in-out  hover:text-yellow-400 " :class="{'border-yellow-500 border-b-2 ' : whenClick == 1}"
	href="#productNav"
	@click="isOpen = false" 
	>Product
</a>
</li>
<li class="mr-3">
	<a data-scroll x-on:click="whenClick = '2'"  :class="{'border-yellow-500 border-b-2 ' : whenClick == '2'}"
	class="md:hidden inline-block text-gray-600 no-underline hover:text-yellow-400 transition duration-300 ease-in-out hover:text-underline py-2 px-4"
	href="#testimonialsNav"
	@click="isOpen = false"
	>Testimonials
</a>
</li>
<li class="mr-3">
	<a data-scroll  x-on:click="whenClick = '3'" :class="{'border-yellow-500 border-b-2 ' : whenClick == '3'}"
	class="md:hidden inline-block text-gray-600 no-underline hover:text-yellow-400 duration-300 hover:text-underline py-2 px-4"
	href="#aboutNav"
	@click="isOpen = false"
	>About
</a>
</li>
<li class="mr-3">
	<a data-scroll  x-on:click="whenClick = '4'" :class="{'bg-indigo-500 shadow-lg' : whenClick == '4'}"
	class=" inline-block bg-blue-100 text-blue-500 rounded-full px-8 py-2 no-underline hover:text-white duration-300 hover:bg-blue-400 hover:text-underline "
	href="{{route('logout')}}"
	@click="isOpen = false"
	>Logout
</a>
</li>
</ul>
</div>
</nav>



<div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">	
	<div class="hidden lg:block fixed z-20 inset-0 top-[3.8125rem] left-[max(0px,calc(50%-45rem))] right-auto w-[19.5rem] pb-10 px-8 overflow-y-auto border-r">
		<nav class="lg:text-base lg:leading-6 relative flex flex-col text-left pt-10">
			<div
			class="w-full flex-grow lg:flex lg:w-auto"
			:class="{ 'block shadow-3xl': isOpen, 'hidden': !isOpen }"
			@click.away="isOpen = false"
			x-show.transition="true"
			>
			<ul 
			class="flex flex-col pt-6 lg:pt-0 list-reset lg:flex justify-end flex-1 font-semibold tracking-wide text-gray-600"
			>
			<li >
				<a class=" inline-block py-2 px-4 no-underline  transition duration-300 ease-in-out  hover:text-blue-400 " :class="{'border-blue-500 border-b-2 ' : whenClick == 1}"
				href="{{ route('products.index') }}"
				@click="isOpen = false" 
				>Product
			</a>
		</li>
		<li >
			<a
			class=" inline-block  no-underline hover:text-blue-400 transition duration-300 ease-in-out hover:text-underline py-2 px-4"
			href="{{ route('testimonials.index') }}"
			
			>Testimonials
		</a>
	</li>
	<li >
		<a :class="{'border-blue-500 border-b-2 ' : whenClick == '3'}"
		class=" inline-block  no-underline hover:text-blue-400 duration-300 hover:text-underline py-2 px-4"
		href="{{ route('additional_settings.index') }}"
		@click="isOpen = false"
		>Additional Settings
	</a>
</li>
<li >
		<a :class="{'border-blue-500 border-b-2 ' : whenClick == '3'}"
		class=" inline-block  no-underline hover:text-blue-400 duration-300 hover:text-underline py-2 px-4"
		href="{{ route('category.index') }}"
		@click="isOpen = false"
		>Category Settings
	</a>
</li>
</ul>
</div>	
</nav>
</div>

<div class="lg:pl-[19.5rem]">
	<div class="max-w-3xl mx-auto pt-10 xl:max-w-none xl:ml-0 "  x-data="{ 'showModal': false }" @keydown.escape="showModal = false" x-cloak>
		@yield('content')
	</div>

</div>
</div>


</body>
</html>