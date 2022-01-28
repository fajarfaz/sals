<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SalsProject</title>
    <link rel="icon" href="{{ URL::asset('images/logo.ico') }}" type="image/x-icon"/>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Styles -->

     <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
    .bg-paralax {
        transform-style: preserve-3d;
        transform: perspective(1000px);
    }
    .inner-paralax{
          transform: translateZ(40px);       
    }
    
    @media only screen and (max-device-width: 480px) {
        .pic-paralax{
          transform: translateZ(40px);       
      }
    }
    @media only screen and (min-device-width: 768px) {
      .image-paralax{
          transform: translateZ(40px);       
      }
  }
  
</style>

<body class="antialiased overflow-x-hidden" x-data="{ 'showModal': false, 'showModal1': false  }" @keydown.escape="showModal = false, showModal1 = false" x-cloak>

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

@yield('content')
 
  <div class="w-full  grid grid-cols-2 md:grid-cols-5 px-12 lg:text-base xl:text-lg gap-10 relative"  style="background: url('{{ asset('images/bg-2.jpg') }}');background-size: cover; height: 342.44px;" >
            <div class="col-span-2 h-full backdrop-blur-sm bg-white/30 relative hidden py-8 px-8 md:flex flex-col lg:text-sm xl:text-base ">           
                <div class="flex flex-row space-x-2 items-center pb-5">
                <img src="{{asset('images/logo.png')}}" class="object-contain object-contain rounded-full h-12 w-12"> 
                <label class="font-bold text-2xl  uppercase text-orange-400 tracking-widest">Sals<span class="text-gray-700">Project</span></label> 
                </div>
                <label class="text-gray-500  text-sm"> We are a company engaged in the fashion industry, established in 2018. We
                 producing t-shirts, polo shirts, shirts, jackets and jerseys for promotional t-shirts, t-shirts
                 tourism, office uniforms, work uniforms, t-shirts for the community, outbound t-shirts etc.
                </label>        
                <label class="italic text-gray-600 pt-3 text-sm">Kucur, Dau, Malang ID</label>
            </div>
            <div class="flex flex-col space-y-2 py-8 text-sm">
                <label class="font-semibold mb-4 text-lg">MEDIA</label>
                <a href="https://www.instagram.com/salsproject_id/" class="hover:text-blue-500 duration-300">Instagram</a>
                <a href="#" class="hover:text-blue-500 duration-300">Facebook</a>
                <a href="https://www.tiktok.com/@salsproject_id" class="hover:text-blue-500 duration-300">Tiktok</a>
                <a href="#" class="hover:text-blue-500 duration-300">Lazada</a>
                <a href="#" class="hover:text-blue-500 duration-300">Shoopee</a>
            </div>
            <div class="flex flex-col space-y-2 py-8 text-sm">
                <label class="font-semibold mb-4 text-lg">COLLABORATION</label>
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

$("#leftScroll").click(function () { 
  var leftPos = $('#outfittoday').scrollLeft();
  $("#outfittoday").animate({scrollLeft: leftPos - 400}, 0);
});

$("#rightScroll").click(function () { 
  var leftPos = $('#outfittoday').scrollLeft();
  $("#outfittoday").animate({scrollLeft: leftPos + 400}, 0);
});
$("#topScroll").click(function () { 
  var leftPos = $('#outfittoday1').scrollTop();
  $("#outfittoday1").animate({scrollTop: leftPos - 200}, 0);
 
});

$("#botScroll").click(function () { 
    var leftPos = $('#outfittoday1').scrollTop();
  $("#outfittoday1").animate({scrollTop: leftPos + 200}, 0);

});

</script>
<script>
    $(document).ready(function(){
        $(".map").click(function(){
            $(".click-map").removeClass("absolute w-full h-[480px] top-0");
        });

    });
</script>
    <script  type="text/javascript"  src="{{ asset('js/vanilla-tilt.min.js') }}"></script>
    <script type="text/javascript">
      
    //It also supports NodeList
    VanillaTilt.init(document.querySelectorAll(".your-element"));
</script>
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