<?php 
use App\Http\Controllers\ProductController;
$total = 0;
if(Session::has('user'))
{
    $total = ProductController::cartItem();
}
?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Market</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        @livewireStyles
    </head>
    <body class="font-sans text-gray-700">

        {{-- Navbar Begins --}}
        

        <nav class="border-b border-gray-400 bg-red-600">
            <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
                <ul class="flex flex-col md:flex-row items-center">
                    <li>
                        <a href="{{ url('/') }}" class="text-white">Market</a>
                    </li>
                    <li class="md:ml-16 mt-3 md:mt-0">
                        <a href="{{ url('/') }}" class="text-white">Home</a>
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{{ url('cart') }}" class="text-white">Cart</a>
                    </li>
                    @if(Session::has('user'))
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{{ url('logout') }}" class="text-white">Log Out</a>
                    </li>
                       <li class="md:ml-6 mt-3 md:mt-0">
                        <span class="text-white">{{ Session::get('user')['name'] }}</span>
                    </li>
                    @else
                     <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{{ url('login') }}" class="text-white">Log In</a>
                    </li>
                    @endif
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{{ url('register') }}" class="text-white">Sign Up</a>
                    </li>
                    {{-- <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{{ url('stores') }}" class="text-white">Find Stores</a>
                    </li> --}}
                </ul>
                <livewire:search-dropdown>
            </div>
        </nav>

      
      {{-- Navbar Ends --}}
    
      {{-- Quick Links Begins --}}

       <nav class="border-b border-gray-200 bg-gray-50">
            <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-4">
                <ul class="flex flex-col md:flex-row items-center">
                     <li class="md:ml-16 mt-3 md:mt-0">
                        <a href="{{ url('home') }}" class="text-gray-500">You are shopping at:</a>
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{{ url('home') }}" class="text-gray-500">Clearance</a>
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{{ url('home') }}" class="text-gray-500">Top Deals</a>
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{{ url('wishlist') }}" class="text-gray-500">Gift Cards</a>
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{{ url('stores') }}" class="text-gray-500">Find Stores</a>
                    </li>
                     <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{{ url('cart') }}" class="text-gray-500">Items in the cart: {{ $total }}</a>
                    </li>
                </ul>
            </div>
        </nav>

        {{-- Quick Links Ends --}}




        @yield('content')



        {{-- Footer Begins --}}

        <div class="mx-auto container xl:px-20 lg:px-12 sm:px-6 px-4 px-4 py-12">
            <div class="flex flex-col items-center justify-center">
                <div class="flex flex-wrap sm:gap-10 gap-8 items-center justify-center mt-8">
                    <a href="javascript:void(0)" class="focus:underline focus:outline-none hover:text-gray-500 text-base cursor-pointer leading-4 text-gray-800 dark:text-gray-400 dark:hover:text-white">About</a>
                    <a href="javascript:void(0)" class="focus:underline focus:outline-none hover:text-gray-500 text-base cursor-pointer leading-4 text-gray-800 dark:text-gray-400 dark:hover:text-white">Contact us</a>
                    <a href="javascript:void(0)" class="focus:underline focus:outline-none hover:text-gray-500 text-base cursor-pointer leading-4 text-gray-800 dark:text-gray-400 dark:hover:text-white">Terms of Service</a>
                    <a href="javascript:void(0)" class="focus:underline focus:outline-none hover:text-gray-500 text-base cursor-pointer leading-4 text-gray-800 dark:text-gray-400 dark:hover:text-white">Privacy Policy</a>
                </div>
                <div class="flex items-center gap-x-8 mt-6">
                    <button aria-label="facebook" class="focus:ring-2 focus:ring-offset-2 focus:ring-2 focus:ring-gray-800 focus:outline-none rounded-full">
                        <svg class="fill-current text-gray-800 dark:text-white hover:text-gray-500" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21.5 11.0631C21.5 5.26467 16.7984 0.56311 11 0.56311C5.20156 0.56311 0.5 5.26467 0.5 11.0631C0.5 16.3037 4.33906 20.6476 9.35938 21.4361V14.0992H6.69266V11.0631H9.35938V8.74983C9.35938 6.11873 10.9273 4.6642 13.3255 4.6642C14.4744 4.6642 15.6763 4.86952 15.6763 4.86952V7.45373H14.3516C13.048 7.45373 12.6402 8.2628 12.6402 9.09436V11.0631H15.552L15.087 14.0992H12.6406V21.437C17.6609 20.649 21.5 16.3051 21.5 11.0631Z" fill="currentColor" />
                        </svg>
                    </button>
                    <button aria-label="instagram" class="focus:ring-2 focus:ring-offset-2 focus:ring-2 focus:ring-gray-800 focus:outline-none rounded-full">
                        <svg class="fill-current text-gray-800 dark:text-white hover:text-gray-500" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.2969 12C14.2969 13.2686 13.2686 14.2969 12 14.2969C10.7314 14.2969 9.70312 13.2686 9.70312 12C9.70312 10.7314 10.7314 9.70312 12 9.70312C13.2686 9.70312 14.2969 10.7314 14.2969 12Z" fill="currentColor" />
                            <path
                                d="M17.3716 7.93616C17.2612 7.63696 17.085 7.36615 16.8561 7.14386C16.6339 6.91498 16.3632 6.73883 16.0638 6.62842C15.821 6.53412 15.4563 6.42188 14.7845 6.3913C14.0577 6.35815 13.8398 6.35101 12 6.35101C10.16 6.35101 9.94208 6.35797 9.21552 6.39111C8.5437 6.42188 8.17877 6.53412 7.93616 6.62842C7.63678 6.73883 7.36597 6.91498 7.14386 7.14386C6.91498 7.36615 6.73883 7.63678 6.62823 7.93616C6.53394 8.17896 6.42169 8.54388 6.39111 9.2157C6.35797 9.94226 6.35083 10.1602 6.35083 12.0002C6.35083 13.84 6.35797 14.0579 6.39111 14.7847C6.42169 15.4565 6.53394 15.8212 6.62823 16.064C6.73883 16.3634 6.91479 16.634 7.14368 16.8563C7.36597 17.0852 7.6366 17.2614 7.93597 17.3718C8.17877 17.4662 8.5437 17.5785 9.21552 17.6091C9.94208 17.6422 10.1598 17.6492 11.9998 17.6492C13.84 17.6492 14.0579 17.6422 14.7843 17.6091C15.4561 17.5785 15.821 17.4662 16.0638 17.3718C16.6648 17.14 17.1398 16.665 17.3716 16.064C17.4659 15.8212 17.5781 15.4565 17.6089 14.7847C17.642 14.0579 17.649 13.84 17.649 12.0002C17.649 10.1602 17.642 9.94226 17.6089 9.2157C17.5783 8.54388 17.4661 8.17896 17.3716 7.93616ZM12 15.5383C10.0457 15.5383 8.46149 13.9543 8.46149 12C8.46149 10.0457 10.0457 8.46167 12 8.46167C13.9541 8.46167 15.5383 10.0457 15.5383 12C15.5383 13.9543 13.9541 15.5383 12 15.5383ZM15.6782 9.14868C15.2216 9.14868 14.8513 8.77844 14.8513 8.32178C14.8513 7.86511 15.2216 7.49487 15.6782 7.49487C16.1349 7.49487 16.5051 7.86511 16.5051 8.32178C16.5049 8.77844 16.1349 9.14868 15.6782 9.14868Z"
                                fill="currentColor"
                            />
                            <path
                                d="M12 0C5.3736 0 0 5.3736 0 12C0 18.6264 5.3736 24 12 24C18.6264 24 24 18.6264 24 12C24 5.3736 18.6264 0 12 0ZM18.8491 14.8409C18.8157 15.5744 18.6991 16.0752 18.5288 16.5135C18.1708 17.4391 17.4391 18.1708 16.5135 18.5288C16.0754 18.6991 15.5744 18.8156 14.8411 18.8491C14.1063 18.8826 13.8715 18.8906 12.0002 18.8906C10.1287 18.8906 9.8941 18.8826 9.15912 18.8491C8.42578 18.8156 7.9248 18.6991 7.48663 18.5288C7.02667 18.3558 6.61029 18.0846 6.26605 17.7339C5.91559 17.3899 5.64441 16.9733 5.47137 16.5135C5.30109 16.0754 5.18445 15.5744 5.15112 14.8411C5.11725 14.1061 5.10938 13.8713 5.10938 12C5.10938 10.1287 5.11725 9.89392 5.15094 9.15912C5.18427 8.4256 5.30072 7.9248 5.47101 7.48645C5.64404 7.02667 5.91541 6.61011 6.26605 6.26605C6.61011 5.91541 7.02667 5.64423 7.48645 5.47119C7.9248 5.3009 8.4256 5.18445 9.15912 5.15094C9.89392 5.11743 10.1287 5.10938 12 5.10938C13.8713 5.10938 14.1061 5.11743 14.8409 5.15112C15.5744 5.18445 16.0752 5.3009 16.5135 5.47101C16.9733 5.64404 17.3899 5.91541 17.7341 6.26605C18.0846 6.61029 18.356 7.02667 18.5288 7.48645C18.6993 7.9248 18.8157 8.4256 18.8492 9.15912C18.8828 9.89392 18.8906 10.1287 18.8906 12C18.8906 13.8713 18.8828 14.1061 18.8491 14.8409Z"
                                fill="currentColor"
                            />
                        </svg>
                    </button>
                    <button aria-label="pinterest" class="focus:ring-2 focus:ring-offset-2 focus:ring-2 focus:ring-gray-800 focus:outline-none rounded-full">
                        <svg class="fill-current text-gray-800 dark:text-white hover:text-gray-500" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.0027 0.554382C5.37441 0.554382 0 5.94525 0 12.5938C0 17.5224 2.9578 21.7577 7.18553 23.6228C7.15338 22.7843 7.18017 21.7739 7.39451 20.8602C7.62492 19.882 8.93771 14.2976 8.93771 14.2976C8.93771 14.2976 8.55191 13.529 8.55191 12.3949C8.55191 10.6105 9.58071 9.27759 10.8667 9.27759C11.9598 9.27759 12.4849 10.0999 12.4849 11.0835C12.4849 12.1853 11.783 13.83 11.424 15.3564C11.1239 16.6356 12.0616 17.6729 13.3208 17.6729C15.5928 17.6729 17.1253 14.7437 17.1253 11.2716C17.1253 8.63262 15.3516 6.66009 12.1313 6.66009C8.49297 6.66009 6.22103 9.38508 6.22103 12.4272C6.22103 13.4753 6.53181 14.217 7.01407 14.7867C7.23376 15.0501 7.26591 15.1576 7.18553 15.4585C7.12659 15.6789 6.99799 16.211 6.93905 16.426C6.85867 16.7324 6.61219 16.8398 6.33891 16.727C4.66176 16.039 3.87944 14.2008 3.87944 12.1262C3.87944 8.70786 6.75686 4.60694 12.4581 4.60694C17.0395 4.60694 20.0563 7.9339 20.0563 11.5027C20.0563 16.2271 17.436 19.753 13.578 19.753C12.2813 19.753 11.065 19.0489 10.647 18.2534C10.647 18.2534 9.95043 21.0268 9.8004 21.5642C9.54856 22.4941 9.05023 23.4185 8.59478 24.1441C9.6996 24.471 10.8454 24.6376 11.9973 24.6386C18.6256 24.6386 24 19.2477 24 12.5992C24 5.95062 18.6309 0.554382 12.0027 0.554382Z"
                                fill="currentColor"
                            />
                        </svg>
                    </button>
                </div>
                <div class="flex items-center mt-6">
                    <p class="text-base leading-4 text-gray-800 dark:text-gray-400">2021 <span class="font-semibold">Market</span></p>
                    <div class="border-l border-gray-800 pl-2 ml-2">
                        <p class="text-base leading-4 text-gray-800 dark:text-gray-400">Built with Laravel.</p>
                    </div>
                </div>
            </div>
        </div>
    
        {{-- Footer Ends --}}
        <script src="{{ asset('js/app.js') }}" defer></script>
        @livewireScripts
    </body>
</html>
