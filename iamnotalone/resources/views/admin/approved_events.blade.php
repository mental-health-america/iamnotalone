@extends('admin.layout.master')
@section('content')

    <div class="w-full px-4 justify-items-center mt-8">
        <input type="text" name="" id="search" class="block mx-auto border-2 text-lg text-center font-medium border-gray-100 focus:outline-none block w-full px-10 py-3 rounded-lg focus:border-gray-700" placeholder="Search by Activity Name, Activity Type, Activity Organizer, Location, Status">
    </div>

    
    <div class="mt-8 w-full">
        <table class="min-w-max w-full table-auto" id="table">
            <thead>
                <tr class="text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-6 px-6 text-center resize-x">Activity Name</th>
                    <th class="py-6 px-6 text-center resize-x">Activity Type</th>
                    <th class="py-6 px-6 text-center resize-x">Category</th>
                    <th class="py-6 px-6 text-center resize-x">Organizer</th>
                    <th class="py-6 px-6 text-center resize-x">Location</th>
                    <th class="py-6 px-6 text-center resize-x">Status</th>
                    <th></th>
                </tr>
            </thead>

            <tbody class="text-gray-600 text-sm font-medium" id="tbody">
                @if (count($approvedEvents))
                    @foreach ($approvedEvents as $event)
                        <tr class="bg-white my-3 text-center">
                            <td class="pl-4 py-4 my-2 whitespace-nowrap">
                                <span class="">{{$event->name}}</span>
                            </td>
                            <td class="text-center py-4 my-2">
                                @if ($event->online)
                                    Online
                                @elseif($event->inperson)
                                    inperson
                                @else
                                    Hybrid
                                @endif
                            </td>
                            <td class="text-center py-4 my-2">
                                <span>{{$event->category}}</span>
                            </td>
                            <td class="text-center py-4 my-2">
                                {{$event->organizer->first_name.' '.$event->organizer->last_name}}
                            </td>
                            <td class="text-center py-4 my-2">
                                @if ($event->online)
                                    <p>
                                        <a href="{{$event->link}}">{{$event->platform}}</a>
                                    </p>
                                @endif
                                @if ($event->inperson)
                                    <p>{{$event->city.', '.$event->state}}</p>
                                @endif
                                @if ($event->training)
                                    Youtube
                                @endif
                            </td>
                            <td class="text-center py-4 my-2">
                                @if ($event->approved == 1)
                                    <span class="text-white bg-green-300 rounded-full font-bold py-2 px-4">Approved</span>
                                @elseif(!$event->approved)
                                    <span class="text-white bg-yellow-300 font-bold rounded-full py-2 px-4">Pending</span>
                                @else
                                    <span class="text-white bg-red-600 rounded-full font-bold py-2 px-4">Declined</span>
                                @endif
                            </td>
                            <td class="text-center py-4 my-2">
                                <div class="relative">
                                    <a href="#" class="relative z-2 block rounded-md bg-white p-2 focus:outline-none" onclick="showHideMenu('op{{$event->id}}')">
                                        <svg width="20" height="4" viewBox="0 0 20 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.81086 3.73333C1.60952 3.73333 0.63564 2.8976 0.63564 1.86667C0.63564 0.835735 1.60952 0 2.81086 0C4.0122 0 4.98608 0.835735 4.98608 1.86667C4.98608 2.8976 4.0122 3.73333 2.81086 3.73333Z" fill="#858585"/>
                                            <path d="M9.95808 3.73333C8.75674 3.73333 7.78286 2.8976 7.78286 1.86667C7.78286 0.835735 8.75674 0 9.95808 0C11.1594 0 12.1333 0.835735 12.1333 1.86667C12.1333 2.8976 11.1594 3.73333 9.95808 3.73333Z" fill="#858585"/>
                                            <path d="M17.1053 3.73333C15.904 3.73333 14.9301 2.8976 14.9301 1.86667C14.9301 0.835735 15.904 0 17.1053 0C18.3066 0 19.2805 0.835735 19.2805 1.86667C19.2805 2.8976 18.3066 3.73333 17.1053 3.73333Z" fill="#858585"/>
                                        </svg>
                                    </a>

                                    <div class="absolute right-0 mt-2 ml-10 w-32 bg-white rounded-md shadow-xl z-20 hidden" id="op{{$event->id}}">
                                        <a href="{{route('admin.event.details', ['id'=>$event->id])}}" class="block px-2 py-3 rounded text-sm capitalize text-gray-700 bg-gradient-to-r hover:from-purple-400 hover:via-pink-500 hover:to-red-500 hover: hover:text-white">
                                            Activity Details
                                        </a>
                                        @if (!$event->approved)
                                            <a href="{{route('admin.event.approve', ['id'=>$event->id])}}" class="block px-2 py-3 rounded text-sm capitalize text-gray-700 bg-gradient-to-r hover:from-purple-400 hover:via-pink-500 hover:to-red-500 hover: hover:text-white">
                                                Approve Activity
                                            </a>
                                            <a href="#" id="openModal" 
                                                class="block px-2 py-3 rounded text-sm capitalize text-gray-700 bg-gradient-to-r hover:from-purple-400 hover:via-pink-500 hover:to-red-500 hover: hover:text-white" 
                                                data-fname="{{$event->organizer->first_name}}" data-lname="{{$event->organizer->last_name}}" data-uid="{{$event->user_id}}" data-eid="{{$event->id}}" onclick="openModal(this)">
                                                Delete Activity
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="bg-white my-3 text-center">
                        <td colspan="7" class="text-center py-4 my-2">There are no registered Events at the moment.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
@section('js')
    <script>
        document.getElementById('approved').classList.add('active');
    </script>
@endsection
