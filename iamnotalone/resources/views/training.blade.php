@extends('layout.master')
@section('content')
    <div class="text-center mb-8">
        <h1 class="text-2xl text-gray-400">
            {{$event->name}}
        </h1>
    </div>
    @if (count($episodes))
        <div class="w-full p-4 sm:p-0 sm:w-5/6 md:w-4/6 sm:mx-auto">
            <h1 class="text-2xl text-gray-800 p-4 bg-green-100">{{$event->name.' : '.$currentEpisode->title}}</h1>
            <iframe
                class="w-full h-80"
                src="{{$currentEpisode->url}}"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowFullScree>
            </iframe>

            @php
                $materials = $currentEpisode->materials;
            @endphp

            <div class="my-4">
                @if (count($materials))
                    @php
                        $x = 1;
                    @endphp
                    @foreach ($materials as $material)
                        <p class="my-1 pb-4">
                            <a href="/{{$material->material}}" target="_blank">Download Episode Material {{$x}}</a>
                        </p>
                        @php
                            ++$x;
                        @endphp
                    @endforeach
                @else
                    <p class="my-2">No material available for download.</p>
                @endif
            </div>

            @foreach ($episodes as $episode)
                @if ($episode->id !== $currentEpisode->id)
                    <a href="{{route('event.training.start',['id'=>$event->id, 'eId'=>$episode->id])}}">
                        <h1 class="text-lg mb-1 text-gray-800 p-4 bg-green-100">{{$event->name.' : '.$episode->title}}</h1>
                    </a>
                @endif
            @endforeach
        </div>
    @else
        <p class="text-center text-gray-600 text-lg">Materials for the training have not been uploaded.</p>
    @endif
@endsection
@section('js')
    <script>
        document.getElementById("events").classList.add('link-active');
    </script>
@endsection
