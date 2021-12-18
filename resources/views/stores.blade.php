@extends('layouts.default')

@section('content')


        <div class="bg-gray-100">
            <div class="container mx-auto">
                <div role="article" class="bg-gray-100 py-12 md:px-8">
                    <div class="px-4 xl:px-0 py-10">
                        <div class="flex flex-col lg:flex-row flex-wrap">
                            <div class="mt-4 lg:mt-0 lg:w-3/5">
                                <div>
                                    <h1 class="text-3xl ml-2 lg:ml-0 lg:text-4xl font-bold text-gray-900 tracking-normal lg:w-11/12">Find a store</h1>
                                </div>
                            </div>
                            <div class="lg:w-2/5 flex mt-10 ml-2 lg:ml-0 lg:mt-0 lg:justify-end">
                                <div class="pt-2 relative text-gray-600">
                                    <input class="focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" type="search" name="search" placeholder="Search" />
                                    <button type="submit" class="focus:ring-2 focus:ring-offset-2 text-gray-600 focus:text-indigo-700 focus:rounded-full focus:bg-gray-100 focus:ring-indigo-700 bg-white focus:outline-none absolute right-0 top-0 mt-5 mr-4">
                                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background: new 0 0 56.966 56.966" xml:space="preserve" width="512px" height="512px">
                                            <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 xl:px-0">
                        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 pb-6 gap-8">
                            @foreach ($storeList as $location)
                            <div role="cell" class="bg-gray-100">
                                <div class="bg-white p-5 rounded-md relative h-full w-full">
                                    <!-- class="absolute inset-0 object-center object-cover h-full w-full"  -->
                                    <h1 class="pb-2 text-4xl font-semibold">{{ $location['location_names']['0']['name'] ?? 'Near You' }}</h1>
                                    @php
                                    if($openStatus === "Open"){
                                        <h2 class="text-green-500 text-2xl">{{ $openStatus }}</h2>
                                    }    
                                    else {
                                        <h2 class="text-red-500 text-2xl">{{ $openStatus }}</h2>
                                    }
                                    @endphp
                                    <div class="my-5">
                                        <div class="flex items-center pb-4 cursor-pointer w-full space-x-3">
                                            <h4 class="text-md text-gray-900">{{ $location['address']['address_line1'] }}, {{ $location['address']['city'] }}, {{ $location['address']['region'] }}, {{ $location['address']['postal_code'] }}</h4>
                                        </div>
                                        <div class="flex items-center pb-4 cursor-pointer w-full">
                                            <h4 class="text-md text-green-500 pl-4">Open Today: {{ $openingTime }} - {{ $closingTime }}</h4>
                                        </div>
                                        <div class="flex items-center pb-4 cursor-pointer w-full">
                                            <h4 class="text-md text-gray-900 pl-4">Phone Number: {{ $phoneNumber }}</h4>
                                        </div>
                                    </div>
                                    <a class="hover:text-indigo-500 hover:underline absolute bottom-5 text-sm text-indigo-700 font-bold cursor-pointer flex items-center" href="{!! route('store-info', ['location_id'=>$location_id]) !!}">
                                        <p>More Details</p>
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#4338CA" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <line x1="5" y1="12" x2="19" y2="12" />
                                                <line x1="15" y1="16" x2="19" y2="12" />
                                                <line x1="15" y1="8" x2="19" y2="12" />
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

@endsection