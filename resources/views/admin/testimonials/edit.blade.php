@extends('layouts.main')
   
@section('content')
    <div class="flex flex-row border-b pb-2 mb-8 items-center justify-between">       
        <div class="flex flex-col ">
    <h2 class="inline-block text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight dark:text-gray-200">
        Editing Testimonial
    </h2>
    <label class="text-blue-600 font-semibold text-xl uppercase">{{ $testimonial->name }}</label>
    </div>
    <a href="{{route('testimonials.index')}}" class="font-semibold bg-gray-100 shadow-md border hover:bg-gray-200 duration-300 text-gray-700 px-6 py-2 rounded-lg"> Back to Product</a>
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
  
    <form action="{{ route('testimonials.update',$testimonial->id) }}" method="POST"  enctype="multipart/form-data" >
        @csrf
        @method('PUT')
    
     <div class="overflow-x-hidden">
          <div class="overflow-y-auto md:max-h-96 -mr-4 pr-4">
                <div class="flex flex-row space-x-4 items-center mb-4">                    
                    <strong class="w-4/12 tracking-wider text-gray-700">Name:</strong>
                    <input type="text" name="name" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12" value="{{$testimonial->name}}" placeholder="Enter Name">                    
                </div>
                <div class="flex flex-row space-x-4 items-center mb-4">                    
                    <strong class="w-4/12 tracking-wider text-gray-700">Job:</strong>
                    <input type="text" name="job" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12" value="{{$testimonial->job}}" placeholder="Enter Person Job">                    
                </div>
                <div class="flex flex-row space-x-4 items-center mb-4">                    
                    <strong class="w-4/12 tracking-wider text-gray-700">Photo:</strong>
                    <img src="/image/{{ $testimonial->photo }}" class="w-16 object-cover mr-4">
                    <input type="file" name="photo"  value="{{$testimonial->photo}}" placeholder="photo" class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-6/12">
                </div>        
                <div class="flex flex-row space-x-4 items-center mb-4">                    
                    <strong class="w-4/12 tracking-wider text-gray-700">Testimonial:</strong>
                    <textarea class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12"  style="height:150px" name="testimonial"  placeholder="Enter Description">{{$testimonial->testimonial}}
                    </textarea> 
                </div>                    
                <div class="flex flex-row space-x-4 items-center mb-4">                    
                    <strong class="w-4/12 tracking-wider text-gray-700">Star of rate:</strong>                    
                    <select class="px-5 py-3 rounded-md bg-gray-100 border focus:outline-none focus:bg-gray-50 hover:border-indigo-200 w-8/12" name="star">
                        <option selected>{{$testimonial->star}}</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>

                </div>
            </div>

            <div class="flex justify-end mt-4 pt-4  border-t px-7 space-x-2 bg-gray-50 -mx-6 pb-10">                 
                <button class="px-8 tracking-wider bg-blue-400 p-3 rounded-lg text-white hover:bg-blue-500 duration-300 font-semibold tracking-wider" type="submit" >Save</button>
            </div>
   
    </form>
@endsection