@extends('layout.master')

@section('content')

<section class="categories px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="text-left">
        <h2 class="text-xl font-bold text-indigo-400 uppercase"></h2>
    </div>

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
        document.getElementById("events").classList.add('link-active');
    </script>
    <script src="{{asset('js/events_filter.js')}}"></script>
@endsection
