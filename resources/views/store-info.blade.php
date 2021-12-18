@extends('layouts.default')

@section('content')

<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">{{ $storeInfo['location_names']['0']['name'] }}</h1>
      <h4 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">{{ $storeInfo['address']['address_line1'] ?? '' }}, {{ $storeInfo['address']['city'] ?? '' }}, {{ $storeInfo['address']['state'] ?? '' }}, {{ $storeInfo['address']['postal_code'] ?? '' }} </h4>
      <h4 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">{{ $storeInfo['contact_information']['0']['telephone_number'] ?? '' }}</h4>
      <a href="stores" class="lg:w-1/2 w-full leading-relaxed underline text-yellow-500">Find another store</a>
    </div>
    @foreach ($hours as $time)
    <div class="flex flex-wrap -m-4">
      <div class="xl:w-1/3 md:w-1/2 p-4">
        <div class="border border-gray-200 p-6 rounded-lg">
          <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
              <i class="far fa-clock"></i>
            </svg>
          </div>
          <h2 class="text-lg text-gray-900 font-medium title-font mb-2">{{ $time['day_name'] }}, {{ \Carbon\Carbon::parse($time['date'])->format('M d, Y') }}</h2>
          <p class="leading-relaxed text-base">{{ $openingTime }} - {{ $closingTime }}</p>
        </div>
      </div>
    </div>
    @endforeach
    <button class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
  </div>
</section>

@endsection