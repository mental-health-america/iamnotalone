@extends('admin.layout.master')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@iconscout/unicons@3.0.6/css/line.css">
@endsection
@section('content')
    <div class="container">
        <div class="w-full mx-auto">
            <div class="flex flex-col">
                <div class="">
                    <img class="object-cover h-auto md:h-96 w-full rounded-xl" alt="Event title" src="{{asset('images/events/event5.png')}}">
                </div>
            </div>
            <div class="md:w-3/4 px-4 my-8"> 
                <h1 class="mt-4 text-2xl md:text-3xl font-medium text-indigo-800 transition duration-150 hover:text-gray-600">
                    {{$event->name}}
                </h1>
                <p class="my-8 w-full md:w-4/5 text-sm text-gray-600">
                    {{$event->description}}
                </p>
                 <p> <b>Organizer:</b> {{$event->organizer->first_name.' '.$event->organizer->last_name}}</p>
                @if ($event->peers)
                    <span class="px-8 py-3 text-sm bg-green-200 rounded-lg text-center text-gray-600 font-bold inline-block">
                        This event is for peers only <span class="uil-smile-squint-wink-alt"></span>
                    </span>
                @endif    
            </div>
            <div class="flex flex-flex flex-col md:flex-row mb-4 pl-4">
                <div class="pr-10">
                    @if ($event->inperson)
                        <p class="text-sm text-gray-600 font-semibold mb-4"> <span class="uil uil-map-marker text-lg"></span> {{$event->venue.', '.$event->address1.'. '. $event->city.', '.$event->state}} </p>
                    @endif
                    @if($event->online)
                        <p class="text-sm text-gray-600 mb-4 font-semibold"> {{$event->platform}} <span class="uil uil-link text-lg"></span> 
                        @if($event->registration_link)
                            <a href="{{$event->registration_link}}">{{$event->registration_link}}</a> 
                        @else
                            <a href="{{$event->link}}">{{$event->link}}</a> 
                        @endif
                        </p>
                    @endif
                    <p class="text-sm text-yellow-500 font-semibold"> <span class="uil uil-clock text-lg text-black"></span> {{\Carbon\Carbon::parse($event->start_date)->format('l')}}, {{date('h:i:s a', strtotime($event->start_time))}} PDT</p>
                    <p class="text-gray-600 mt-4">Disability Accomodations</p>
                    @if (count($accomodations))
                        <ul class="pl-8 list-disc inline-block">
                            @foreach ($accomodations as $accomodation)
                                <li>{{$accomodation->accomodation}}</li>
                            @endforeach
                        </ul>
                    @else
                        <ul class="pl-8 list-disc inline-block">
                            <li>None</li>
                        </ul>
                    @endif  
                </div>
            </div>
            @if (!$event->approved)
                <div class="flex flex-row mt-4 mb-8 px-40">
                    <a href="{{route('admin.event.approve', ['id'=>$event->id])}}" id="register" class="py-2 px-12 w-1/2 bg-indigo-800 mr-2 hover:bg-gray-100 hover:text-gray-800 hover:border-2 hover:border-indigo-800 border-2 focus:ring-indigo-500 flex-nowrap focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                        Approve <i class="uil uil-check"></i>
                    </a>

                    <a href="#disapproveModal" rel="modal:open" id="register" class="py-2 px-12 bg-gray-100 text-gray-800 ml-2 hover:bg-indigo-700 hover:text-white border-2 border-indigo-600 focus:ring-indigo-500 flex-nowrap focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                        Disapprove <i class="uil uil-cancel"></i>
                    </a>
                    <div></div>
                </div>
            @endif

            @if ($event->approved)
                <a id="delete" href="#" class="py-2 px-12 bg-red-600 text-white ml-2 hover:bg-indigo-700 hover:text-white border-2 border-indigo-600 focus:ring-indigo-500 flex-nowrap focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                    Delete <i class="uil uil-cancel"></i>
                </a>
                <div></div>
            @endif
        </div>
    </div>

    <!-- Modal HTML embedded directly into document -->
    <div id="disapproveModal" class="modal" style="width: 75%; max-width: 75%; padding: 5% 10%">
       <form class="text-center" method="POST" action="{{route('admin.message.send')}}">
            @csrf
            <h4 class="font-medium uppercase tracking-wider text-lg mb-10 w-full">
                Message to let {{$event->organizer->first_name}} know why this event is not being approved.
            </h4>
            <div class="py-2 text-left">
                 <label for="event_name" class="uppercase block text-xs mb-2">Organizer</label>
                <input type="text" class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Organizer" name="organizer" readonly required value="{{$event->organizer->first_name.' '.$event->organizer->last_name}}"/>
            </div>
            
            <div class="py-2 text-left">
                <label for="event_name" class="uppercase block text-xs mb-2">Message</label>
                <textarea cols="30" rows="4" id="editor" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-8 rounded-lg focus:border-gray-700" placeholder="Message..." name="msg" autofocus required></textarea>
            </div>
            <input type="hidden" name="uid" value="{{$event->organizer->id}}">
            <input type="hidden" name="eid" value="{{$event->id}}">
            <div class="py-2 mt-6">
                <button type="submit" class="border-2 text-sm border-gray-100 focus:outline-none bg-indigo-800 text-white font-medium uppercase tracking-wider block w-3/4 md:w-1/2  m-auto py-4 rounded-lg focus:border-gray-700 hover:bg-purple-700">
                    Send Message
                </button>
            </div>
        </form>
    </div>

@endsection

@section('js')
    @if ($event->approved == 1)
        <script>
            document.getElementById("approved").classList.add('active');
        </script>
    @elseif(!$event->approved)
        <script>
            document.getElementById("pending").classList.add('active');
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $("#delete").click(function () {

            Swal.fire({
                title: '',
                icon: 'info',
                html:'Are you sure you want to delete this event?',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText:
                    '<i class="fa fa-thumbs-up"></i> Yes!',
                confirmButtonAriaLabel: 'Thumbs up, great!',
                cancelButtonText:
                    '<i class="fa fa-thumbs-down"></i> No!',
                cancelButtonAriaLabel: 'Thumbs down'
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.href = "{{route('admin.training.remove', ['id'=>$event->id])}}";
                } else if (result.isDenied) {
                    Swal.fire('Ok, cool', '', 'info')
                }
            });
        })
    </script>
@endsection