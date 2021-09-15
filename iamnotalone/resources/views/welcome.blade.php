@extends('layout.master')
@section('css')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" type="text/css">
@endsection
@section('content')
<!-- Header section starts here-->
<div id="slider" class="swiper-container swiper-slider swiper-slider-business w-full" data-loop="true" data-slide-effect="fade" data-autoplay="8000" data-simulate-touch="false" data-custom-slide-effect="inter-leave-effect">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <div class="bg-white dark:bg-gray-800 overflow-hidden relative mx-16 hidden md:block">
                <div class="text-start w-1/2 py-12 pl-8 sm:px-6 lg:py-16 lg:px-8 z-20">
                    <h4 class="text-3xl text-black dark:text-white mb-2">
                        You don’t have to be alone anymore
                    </h4>
                    <p>
                        Meet and Connect with new people. Begin the process of building meaningful friendships.
                    </p>
                    <div class="lg:mt-0 lg:flex-shrink-0">
                        <div class="mt-12 inline-flex rounded-md shadow">
                            <a href="{{route('event.new')}}" class="py-2 px-12  bg-primary hover:bg-indigo-700 focus:ring-indigo-500 flex-nowrap focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                        Register Event <i class="uil uil-arrow-right"></i>
                                    </a>
                        </div>
                        or
                        <div class="mt-12 inline-flex rounded-md shadow">
                            <a href="{{route('events')}}" class="py-2 px-12  bg-primary hover:bg-indigo-700 focus:ring-indigo-500 flex-nowrap focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                Browse Events <i class="uil uil-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <img src="{{asset('images/slider/slide1.png')}}" class="absolute h-full max-w-1/2 hidden lg:block right-0 top-0 mr-8"/>
            </div>

            <div class="overflow-hidden relative md:hidden" style="background: #fff url({{asset('images/slider/slider-1.png')}}); background-size: cover">
                <div class="text-start w-full py-8 z-20">
                    <div class="bg-gray-200 opacity-80 p-4">
                        <h4 class="text-xl text-black dark:text-white mb-2">
                            You don’t have to be alone anymore
                        </h4>
                        <p class="text-xs">
                            Meet and Connect with new people. Begin the process of building meaningful friendships.
                        </p>
                    </div>
                    
                    <div class="lg:mt-0 lg:flex-shrink-0 px-4">
                        <div class="mt-12 inline-flex rounded-md shadow">
                            <a href="{{route('event.new')}}" class="py-2 px-12  bg-primary hover:bg-indigo-700 focus:ring-indigo-500 flex-nowrap focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                        Register Event <i class="uil uil-arrow-right"></i>
                                    </a>
                        </div>
                        or
                        <div class="mt-12 inline-flex rounded-md shadow">
                            <a href="{{route('events')}}" class="py-2 px-8 mx-auto bg-primary hover:bg-indigo-700 focus:ring-indigo-500 flex-nowrap focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                Browse Events <i class="uil uil-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="swiper-slide">
            <div class="bg-white dark:bg-gray-800 overflow-hidden relative mx-16 hidden md:block">
                <div class="text-start w-1/2 py-12 pl-8 sm:px-6 lg:py-16 lg:px-8 z-20">
                    <h4 class="text-3xl text-black dark:text-white mb-2">
                        3 in 5 Americans feel lonely
                    </h4>
                    <p>
                        Lack of connectedness can worsen mental and physical conditions.
                    </p>
                    <div class="lg:mt-0 lg:flex-shrink-0">
                        <div class="mt-12 inline-flex rounded-md shadow">
                            <a href="{{route('event.new')}}" class="py-2 px-12  bg-primary hover:bg-indigo-700 focus:ring-indigo-500 flex-nowrap focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                        Register Event <i class="uil uil-arrow-right"></i>
                                    </a>
                        </div>
                        or
                        <div class="mt-12 inline-flex rounded-md shadow">
                            <a href="{{route('events')}}" class="py-2 px-12  bg-primary hover:bg-indigo-700 focus:ring-indigo-500 flex-nowrap focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                Browse Events <i class="uil uil-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <img src="{{asset('images/slider/slide2.png')}}" class="absolute h-full max-w-1/2 hidden lg:block right-0 top-0 mr-8"/>
            </div>

            <div class="overflow-hidden relative md:hidden" style="background: #fff url({{asset('images/slider/slider-2.png')}}); background-size: cover">
                <div class="text-start w-full py-8 z-20">
                    <div class="bg-gray-200 opacity-80 p-4">
                        <h4 class="text-xl text-black dark:text-white mb-2">
                            3 in 5 Americans feel lonely
                        </h4>
                        <p class="text-xs">
                            Lack of connectedness can worsen mental and physical conditions.
                        </p>
                    </div>
                    <div class="lg:mt-0 lg:flex-shrink-0 px-4">
                        <div class="mt-12 inline-flex rounded-md shadow">
                            <a href="{{route('event.new')}}" class="py-2 px-12  bg-primary hover:bg-indigo-700 focus:ring-indigo-500 flex-nowrap focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                        Register Event <i class="uil uil-arrow-right"></i>
                                    </a>
                        </div>
                        or
                        <div class="mt-12 inline-flex rounded-md shadow">
                            <a href="{{route('events')}}" class="py-2 px-8 mx-auto bg-primary hover:bg-indigo-700 focus:ring-indigo-500 flex-nowrap focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                Browse Events <i class="uil uil-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="swiper-slide">
            <div class="bg-white dark:bg-gray-800 overflow-hidden relative mx-16 hidden md:block">
                <div class="text-start w-1/2 py-12 pl-8 sm:px-6 lg:py-16 lg:px-8 z-20">
                    <h4 class="text-3xl text-black dark:text-white mb-2">
                        Loneliness is bad for your health
                    </h4>
                    <p>
                        It can cause the same amount of damage to your lifespan as smoking 15 cigarettes a day.
                    </p>
                    <div class="lg:mt-0 lg:flex-shrink-0">
                        <div class="mt-12 inline-flex rounded-md shadow">
                            <a href="{{route('event.new')}}" class="py-2 px-12  bg-primary hover:bg-indigo-700 focus:ring-indigo-500 flex-nowrap focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                        Register Event <i class="uil uil-arrow-right"></i>
                                    </a>
                        </div>
                        or
                        <div class="mt-12 inline-flex rounded-md shadow">
                            <a href="{{route('events')}}" class="py-2 px-12  bg-primary hover:bg-indigo-700 focus:ring-indigo-500 flex-nowrap focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                Browse Events <i class="uil uil-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <img src="{{asset('images/slider/slide3.png')}}" class="absolute h-full max-w-1/2 hidden lg:block right-0 top-0 mr-8"/>
            </div>

            <div class="overflow-hidden relative md:hidden" style="background: #fff url({{asset('images/slider/slider-3.png')}}); background-size: cover">
                <div class="text-start w-full py-8 z-20">
                    <div class="bg-gray-200 opacity-80 p-4">
                        <h4 class="text-xl text-black dark:text-white mb-2">
                            Loneliness is bad for your health
                        </h4>
                        <p class="text-xs">
                            It can cause the same amount of damage to your lifespan as smoking 15 cigarettes a day.
                        </p>
                    </div>
                    <div class="lg:mt-0 lg:flex-shrink-0 px-4">
                        <div class="mt-12 inline-flex rounded-md shadow">
                            <a href="{{route('event.new')}}" class="py-2 px-12  bg-primary hover:bg-indigo-700 focus:ring-indigo-500 flex-nowrap focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                        Register Event <i class="uil uil-arrow-right"></i>
                                    </a>
                        </div>
                        or
                        <div class="mt-12 inline-flex rounded-md shadow justfy-items-center">
                            <a href="{{route('events')}}" class="py-2 px-8 bg-primary hover:bg-indigo-700 focus:ring-indigo-500 flex-nowrap focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-sm shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">
                                Browse Events <i class="uil uil-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="hidden md:flex swiper-button-prev bg-white w-16 h-16 text-xs rounded-full text-indigo-500"></div>
    <div class="hidden md:flex swiper-button-next bg-white w-16 h-16 text-xs rounded-full text-indigo-500"></div>
    <div class="swiper-pagination"></div>
</div>
<!-- Header section ends here-->

<section class="px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:px-8">

    @if (!count($events))
        <p class="text-lg mt-4 text-gray-600"> There are no registered events at the moment.</p>
    @else
        <div class="flex justify-center rounded-lg text-lg" role="group" id="filters">
            <button class="bg-white text-indigo-500 hover:bg-indigo-500 hover:text-white border border-r-0 text-xs border-indigo-500 rounded-l-lg px-4 py-2 mx-0 outline-none focus:shadow-outline btn-active" data-filter="*">All Events</button>
            @foreach ($categories as $category)
                <button class="bg-white text-indigo-500 hover:bg-indigo-500 hover:text-white border border-r-0 text-xs border-indigo-500 rounded-l-lg px-4 py-2 mx-0 outline-none focus:shadow-outline" data-filter=".{{$category->category}}">{{$category->category}}</button>
            @endforeach
        </div>
        
        <div class="grid gap-6 mx-auto mt-12 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 w-full" id="target">
            @foreach ($events as $event)
                <div class="flex flex-col overflow-hidden rounded-lg shadow-lg lg:col-span-1 mb-5 {{$event->category}}" data-category="{{$event->category}}">
                    <div class="flex-shrink-0">
                        <a href="{{route('event.details', ['id'=>$event->id])}}">
                            <img src="{{asset($event->banner)}}" alt="" class="object-cover w-full h-48">
                        </a>
                    </div>

                    <div class="flex flex-col justify-between flex-1 p-5">
                        <div class="flex-1">
                            <a href="{{route('event.details', ['id'=>$event->id])}}">
                                <h5 class="mt-2 text-lg font-semibold leading-7 text-indigo-400 transition duration-150 hover:text-gray-600">
                                    {{$event->name}}
                                </h5>
                            </a>
                            <p class="mt-3 text-sm text-gray-600">
                                {{substr($event->description, 0, 100)}}...
                            </p>
                        </div>

                        <div class="mt-6">
                            <div class="flex items-center">
                                <div class="text-sm text-gray-500">
                                    <p class="text-yellow-600">
                                        {{\Carbon\Carbon::parse($event->start_date)->format('l')}}, {{date('h:i:s a', strtotime($event->start_time))}} EST
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</section>
@endsection

@section('js')
    <script>
        document.getElementById("home").classList.add('link-active');
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var mySwiper = new Swiper ('.swiper-container', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false
            },

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        })
    </script>
    <script src="{{asset('js/events_filter.js')}}"></script>
@endsection