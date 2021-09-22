@extends('layout.master')
@section('css')
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" type="text/css">
@endsection
@section('content')
    <!-- Header section starts here-->
    <!-- styles -->
    <!-- styles -->
    <style>
        html,
        body {
            position: relative;
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .swiper {
            width: 100%;
        }

        .lime-slider {
            background-color: rgba(151, 169, 38, 0.80);
            padding: 30px 35px 45px 35px !important;
            -webkit-border-radius: 25px;
            -moz-border-radius: 25px;
            border-radius: 25px;
        }

        .bg-secondary {
            background-color: #fff;
            color: #385887;
        }

        .bg-secondary:hover {
            background-color: #385887;
            color: #fff;
        }

    </style>

    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">

            <!-- Swiper 1 -->
            <div class="swiper-slide relative bg-no-repeat bg-cover bg-center h-screen w-full w-full"
                 style="background-image:url({{asset('images/slider/slide-1-lg.png')}})">
                <div class="flex w-full justify-center absolute bottom-20">
                    <div class="text-white lime-slider mx-5">
                        <div class="text-start z-9999">
                            <h4 class="text-3xl text-white dark:text-white mb-2">
                                You don't have to be alone anymore
                            </h4>
                            <p>
                                Meet and Connect with new people and begin the process of building meaningful friendship
                            </p>
                            <div class="lg:mt-0 lg:flex-shrink-0">
                                <div class="mt-12 inline-flex rounded-md shadow">
                                    <a href="{{route('event.new')}}"
                                       class="py-2 px-12 bg-secondary rounded-lg">
                                        Register Event <i class="uil uil-arrow-right"></i>
                                    </a>
                                </div>
                                <div class="mt-2 inline-flex rounded-md shadow">
                                    <a href="{{route('events')}}"
                                       class="py-2 px-12 bg-secondary rounded-lg">
                                        Browse Events <i class="uil uil-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Swiper 1 -->

            <!-- Swiper 2 -->
            <div class="swiper-slide relative bg-no-repeat bg-cover bg-center h-screen w-full w-full"
                 style="background-image:url({{asset('images/slider/slide-2-lg.png')}})">
                <div class="flex w-full justify-center absolute bottom-20">
                    <div class="text-white lime-slider mx-5">
                        <div class="text-start z-9999">
                            <h4 class="text-3xl text-white dark:text-white mb-2">
                                Many Americans struggle with loneliness and Isolation
                            </h4>
                            <p>
                                I am not alone
                            </p>
                            <div class="lg:mt-0 lg:flex-shrink-0">
                                <div class="mt-12 inline-flex rounded-md shadow">
                                    <a href="{{route('event.new')}}"
                                       class="py-2 px-12 bg-secondary rounded-lg">
                                        Register Event <i class="uil uil-arrow-right"></i>
                                    </a>
                                </div>
                                <div class="mt-2 inline-flex rounded-md shadow">
                                    <a href="{{route('events')}}"
                                       class="py-2 px-12 bg-secondary rounded-lg">
                                        Browse Events <i class="uil uil-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Swiper 2 -->

            <!-- Swiper 3 -->
            <div class="swiper-slide relative bg-no-repeat bg-cover bg-center h-screen w-full w-full"
                 style="background-image:url({{asset('images/slider/slide-3-lg.png')}})">
                <div class="flex w-full justify-center absolute bottom-20">
                    <div class="text-white lime-slider mx-5">
                        <div class="text-start z-9999">
                            <h4 class="text-3xl text-white dark:text-white mb-2">
                                Lack of connectedness can worsen mental and physical conditions.
                            </h4>
                            <p>
                                While also increasing the risk of death.
                            </p>
                            <div class="lg:mt-0 lg:flex-shrink-0">
                                <div class="mt-12 inline-flex rounded-md shadow">
                                    <a href="{{route('event.new')}}"
                                       class="py-2 px-12 bg-secondary rounded-lg">
                                        Register Event <i class="uil uil-arrow-right"></i>
                                    </a>
                                </div>
                                <div class="mt-2 inline-flex rounded-md shadow">
                                    <a href="{{route('events')}}"
                                       class="py-2 px-12 bg-secondary rounded-lg">
                                        Browse Events <i class="uil uil-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Swiper 3 -->

        </div><!-- End Swiper Wrapper -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div><!-- End mySwiper -->
    <!-- End Swiper -->

    <section class="px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:px-8">

        @if (!count($events))
            <p class="text-lg mt-4 text-gray-600"> There are no registered events at the moment.</p>
        @else
            <div class="flex justify-center rounded-lg text-lg" role="group" id="filters">
                <button
                    class="bg-white text-indigo-500 hover:bg-indigo-500 hover:text-white border border-r-0 text-xs border-indigo-500 rounded-l-lg px-4 py-2 mx-0 outline-none focus:shadow-outline btn-active"
                    data-filter="*">All Events
                </button>
                @foreach ($categories as $category)
                    <button
                        class="bg-white text-indigo-500 hover:bg-indigo-500 hover:text-white border border-r-0 text-xs border-indigo-500 rounded-l-lg px-4 py-2 mx-0 outline-none focus:shadow-outline"
                        data-filter=".{{$category->category}}">{{$category->category}}</button>
                @endforeach
            </div>

            <div class="grid gap-6 mx-auto mt-12 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 w-full" id="target">
                @foreach ($events as $event)
                    <div
                        class="flex flex-col overflow-hidden rounded-lg shadow-lg lg:col-span-1 mb-5 {{$event->category}}"
                        data-category="{{$event->category}}">
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
                                            {{\Carbon\Carbon::parse($event->start_date)->format('l')}}
                                            , {{date('h:i:s a', strtotime($event->start_time))}} EST
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
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper', {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    <script src="{{asset('js/events_filter.js')}}"></script>
@endsection
