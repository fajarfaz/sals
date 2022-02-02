@extends('layouts.main')

@section('content')
<div class="flex flex-row justify-between items-center mb-8 ">       
    <h2 class="inline-block text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight dark:text-gray-200">
        Editing Category of {{ $category->name }}
    </h2>
  
</div>


<form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data" class="pt-4 px-3">
    @csrf
    <div class="overflow-y-auto md:max-h-96 -mr-4 pr-4">
        <div class="flex flex-row space-x-4 items-center mb-4">                    
            <strong class="w-4/12 tracking-wider text-gray-700">Name:</strong>
            <input type="text" name="name" id="name" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12" placeholder="Enter Name" value="{{ $category->name }}">                    
        </div>
        <div class="flex flex-row space-x-4 items-center mb-4">                    
            <strong class="w-4/12 tracking-wider text-gray-700">Slug:</strong>
            <input type="text" name="slug" id="slug" readonly class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12" placeholder="Automatic fill"  value="{{ $category->slug }}">                
        </div>              

    </div>
    <div class="flex justify-end mt-4 pt-4  border-t px-9 bg-gray-50 -mx-10 pb-10">                 
        <button class="px-8 tracking-wider bg-blue-400 p-3 rounded-lg text-white hover:bg-blue-500 duration-300 font-semibold tracking-wider" type="submit" >Save</button>
    </div>
</form>



<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function() {
        fetch('admin/category/checkSlug?name='+name.value )
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    })
</script>
@endsection