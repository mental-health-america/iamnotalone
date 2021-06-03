@extends('layout.master')
@section('content')
    <section class="flex flex-col mb-10">
        <div class="flex flex-1 items-center justify-center">
            <div class="px-4 sm-px-0 lg:w-3/5 sm:w-4/5 w-full sm:m-auto w-full text-gray-600">
                <div class="mb-6">
                    <h1 class="font-medium uppercase tracking-wider text-3xl mb-10 w-full text-center text-black">
                        Create your Event
                    </h1>
                    <p class="text-sm sm:text-center">Help your attendees plan better by knowing when this event will be happening.</p>
                </div>

                <form class="" method="POST" action="{{route('event.date.set')}}">
                    @csrf
                    <div class="">
                        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
                            <div class="py-2 text-left">
                                <label for="event_name" class="uppercase block text-xs mb-2">Start Date</label>
                                <input type="date" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="State Date" name="start_date" required/>
                            </div>

                            <div class="py-2 text-left">
                                <label for="event_name" class="uppercase block text-xs mb-2">Start Time</label>
                                <input type="time" class="border text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Start Time" name="start_time" required/>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
                            <div class="py-2 text-left">
                                <label for="event_name" class="uppercase block text-xs mb-2">End Date</label>
                                <input type="date" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="End date" name="end_date" required/>
                            </div>

                            <div class="py-2 text-left">
                                <label for="event_name" class="uppercase block text-xs mb-2">End Time</label>
                                <input type="time" class="border text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700" placeholder="End Time" name="end_time" required/>
                            </div>
                        </div>

                        <div class="py-2 text-left">
                            <label for="event_name" class="uppercase block text-xs mb-2">Event Frequency</label>
                            <select name="frequency" id="frequency" class="border text-sm border-gray-100 bg-white focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700">
                                <option value="once">Once</option>
                                <option value="daily">Daily</option>
                                <option value="weekly">Weekly</option>
                                <option value="bi-weekly">Bi-Weekly</option>
                                <option value="monthly">Monthly</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div class="py-2 mt-6">
                            <button type="submit" class="uppercase text-center border border-gray-100 focus:outline-none bg-primary text-white text-sm font-semibold tracking-wider block w-3/4 md:w-1/2 m-auto py-3 rounded-lg focus:border-gray-700 hover:bg-purple-700">
                                Create Event
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        document.getElementById("events").classList.add('link-active');
    </script>
@endsection