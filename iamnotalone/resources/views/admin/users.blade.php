@extends('admin.layout.master')
@section('content')

    <div class="w-5/6 justify-items-center my-8 mx-auto">
        <input type="text" name="" id="" class="block mx-auto border-2 text-center text-sm border-gray-100 focus:outline-none block w-full p-3 rounded-lg focus:border-gray-700" placeholder="Search by Event Name, Event Type, Event Organizer, Location, Status">
    </div>

    <div class="overflow-x-auto">
        <div class="min-w-screen mt-12 flex items-center justify-center font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <div class=" shadow-md rounded">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-center">First Name</th>
                                <th class="py-3 px-6 text-center">Last Name</th>
                                <th class="py-3 px-6 text-center">Email</th>
                                <th class="py-3 px-6 text-center">Location</th>
                                <th class="py-3 px-6 text-center">Type</th>
                            </tr>
                        </thead>
                        
                        <tbody class="text-gray-600 text-sm font-medium">
                            @if (count($users))
                                @foreach ($users as $user)
                                    <tr class="bg-white my-3 text-center">
                                        <td class="pl-4 py-4 my-2 whitespace-nowrap">
                                            <span class="font-medium">{{$user->first_name}}</span>
                                        </td>
                                        <td class="text-center py-4 my-2">
                                            <span>{{$user->last_name}}</span>
                                        </td>
                                        <td class="text-center py-4 my-2">
                                            {{$user->email}}
                                        </td>
                                        <td class="text-center py-4 my-2">
                                            {{$user->state}}
                                        </td>
                                        <td class="text-center py-4 my-2 pr-2">
                                            @if ($user->organizer)
                                                Organizer
                                            @else
                                                User
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="bg-white my-3 text-center">
                                    <td colspan="5" class="text-center py-4 my-2">
                                        There are no registered users on this platform at the moment.
                                    </td>
                                </tr>
                            @endif
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        document.getElementById('users').classList.add('active');
    </script>
@endsection
