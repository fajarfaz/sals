@extends('layouts.main')

@section('content')
<div class="flex flex-row justify-between items-center mb-8 ">       
	<h2 class="inline-block text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight dark:text-gray-200">
		Testimonials Manage
	</h2>
	<button type="button" @click="showModal = true" class="rounded-lg bg-blue-400 hover:bg-blue-500 duration-300 text-white font-semibold px-4 py-2 w-max" >Create New Testimonial</button>
</div>

<div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="showModal" :class="{ 'fixed inset-0 z-40 flex items-center justify-center ': showModal }">
	<!--Dialog-->
	<div class="bg-white w-11/12 md:max-w-2xl  md:mt-10 md:my-10 text-sm mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModal" @click.away="showModal = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90">

		<div class="flex justify-between items-center pb-3">
			<p class="text-2xl font-bold border-b pb-2">New Testimonial</p>
			<div class="cursor-pointer z-50" @click="showModal = false">
				<svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
					<path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
				</svg>
			</div>
		</div>

		<form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data" class="pt-4 px-3">
			@csrf
			<div class="overflow-y-auto md:max-h-96 -mr-4 pr-4">
				<div class="flex flex-row space-x-4 items-center mb-4">                    
					<strong class="w-4/12 tracking-wider text-gray-700">Name:</strong>
					<input type="text" name="name" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12" placeholder="Enter Name">                    
				</div>
				<div class="flex flex-row space-x-4 items-center mb-4">                    
					<strong class="w-4/12 tracking-wider text-gray-700">Job:</strong>
					<input type="text" name="job" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12" placeholder="Enter Person Job">                    
				</div>
				<div class="flex flex-row space-x-4 items-center mb-4">                    
					<strong class="w-4/12 tracking-wider text-gray-700">Photo:</strong>
					<input type="file" name="photo"  placeholder="photo" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12">
				</div>        
				<div class="flex flex-row space-x-4 items-center mb-4">                    
					<strong class="w-4/12 tracking-wider text-gray-700">Testimonial:</strong>
					<textarea class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12"  style="height:150px" name="testimonial" placeholder="Enter Description"></textarea> 
				</div>                    
				<div class="flex flex-row space-x-4 items-center mb-4">                    
					<strong class="w-4/12 tracking-wider text-gray-700">Star of rate:</strong>					  
					<select class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12" name="star">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option selected>5</option>
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
<div class="relative rounded-xl overflow-auto border bg-gray-100 mb-6">
	<div class="shadow-sm overflow-hidden my-4">
		<table class="table-auto text-center w-full text-sm ">
			<thead class="border-b-2 rounded-lg text-gray-700">
				<tr >
					<th class="p-2">No</th>
					<th>Name</th>
					<th>Job</th>
					<th>Testimonial</th>
					<th>Star</th>
					<th width="280px">Action</th>
				</tr>
			</thead>
			<tbody class="bg-white">
				@foreach ($data as $key => $value)
				<tr class="text-gray-500">
					<td class="py-2">{{ ++$i }}</td>
					<td>{{ $value->name }}</td>
					<td>{{ $value->job }}</td>
					<td>{{ \Str::limit($value->testimonial, 100) }}</td>
					<td>{{  $value->star }}</td>
					<td>
						<form action="{{ route('testimonials.destroy',$value->id) }}" method="POST" 
							class="flex flex-row space-x-4 items-center font-semibold justify-center py-2">                                 
							<a href="{{ route('testimonials.edit',$value->id) }}" 
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
{!! $data->links() !!}      
@endsection