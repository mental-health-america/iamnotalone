@extends('admin.layout.master')

@section('content')

    <div class="px-4 mt-8">
        <!--<span class="text-xl font-semibold capitalize">
            {{$training->name}} Training
        </span>-->
        <a href="#trainingModal" rel="modal:open" class=" md:w-1/4 float-right border-2 text-sm border-gray-100 focus:outline-none bg-blue-900 text-white font-medium uppercase text-center block w-full  m-auto py-4 rounded-lg focus:border-gray-700 hover:bg-blue-800">
            <span class="uil uil-plus"></span>
            Update {{$training->name}}
        </a>

         <a href="#seriesModal" rel="modal:open" class=" md:w-1/4 float-right border-2 text-sm border-gray-100 focus:outline-none bg-blue-900 text-white font-medium uppercase text-center block w-full  m-auto py-4 rounded-lg focus:border-gray-700 hover:bg-blue-800">
            <span class="uil uil-plus"></span>
            Add New Episode
        </a>
    </div>

    <div class="mt-8 w-full">
        <table class="min-w-max w-full table-auto" id="table">
            <thead>
                <tr class="text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-6 px-6 text-center resize-x">Episode Title</th>
                    <th class="py-6 px-6 text-center resize-x">Material</th>
                    <th class="py-6 px-6 text-center resize-x">Youtube Url</th>
                    <th class="py-6 px-6 text-center resize-x"></th>
                </tr>
            </thead>

            <tbody class="text-gray-600 text-sm font-medium" id="tbody">
                @if (count($episodes))
                        @foreach ($episodes as $episode)
                            @php
                                $materials = $episode->materials;
                            @endphp
                            <tr class="bg-white my-3 text-center">
                                <td class="py-4 my-2">
                                    {{$episode->title}}
                                </td>
                                <td class="py-4 my-2">
                                    @if (count($materials))
                                        @php
                                            $x = 1;
                                        @endphp
                                        <ul>
                                            @foreach ($materials as $material)
                                                <li>
                                                    <h5>{{$material->title}}</h5>
                                                    <a href="/{{$material->material}}" target="_blank" rel="noopener noreferrer">Download material {{$x}}</a>
                                                </li>
                                                @php
                                                    $x++;
                                                @endphp
                                            @endforeach
                                        </ul>
                                    @else
                                        No material
                                    @endif

                                </td>
                                <td class="py-4 my-2">
                                    <a href="{{$episode->url}}" target="_blank" rel="noopener noreferrer">Watch</a>
                                </td>
                                <td class="py-4 my-2">
                                    <div class="relative">
                                        <a href="#" class="relative z-2 block rounded-md bg-white p-2 focus:outline-none" onclick="showHideMenu('op{{$episode->id}}')">
                                            <svg width="20" height="4" viewBox="0 0 20 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.81086 3.73333C1.60952 3.73333 0.63564 2.8976 0.63564 1.86667C0.63564 0.835735 1.60952 0 2.81086 0C4.0122 0 4.98608 0.835735 4.98608 1.86667C4.98608 2.8976 4.0122 3.73333 2.81086 3.73333Z" fill="#858585"/>
                                                <path d="M9.95808 3.73333C8.75674 3.73333 7.78286 2.8976 7.78286 1.86667C7.78286 0.835735 8.75674 0 9.95808 0C11.1594 0 12.1333 0.835735 12.1333 1.86667C12.1333 2.8976 11.1594 3.73333 9.95808 3.73333Z" fill="#858585"/>
                                                <path d="M17.1053 3.73333C15.904 3.73333 14.9301 2.8976 14.9301 1.86667C14.9301 0.835735 15.904 0 17.1053 0C18.3066 0 19.2805 0.835735 19.2805 1.86667C19.2805 2.8976 18.3066 3.73333 17.1053 3.73333Z" fill="#858585"/>
                                            </svg>
                                        </a>

                                        <div class="absolute right-0 mt-2 ml-10 w-32 bg-white rounded-md shadow-xl z-20 hidden" id="op{{$episode->id}}">
                                            <a href="{{route('admin.training.episode.remove', ['id'=>$episode->id])}}" class="block px-2 py-3 rounded text-sm capitalize text-gray-700 bg-gradient-to-r hover:from-purple-400 hover:via-pink-500 hover:to-red-500 hover: hover:text-white">
                                                Delete Episode
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="bg-white my-3 text-center">
                            <td colspan="4" class="text-center py-4 my-2">
                                No episodes have been added to this training yet.
                            </td>
                        </tr>
                    @endif
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Modal HTML embedded directly into document -->
    <div id="seriesModal" class="modal" style="width: 75%; max-width: 75%; padding: 5% 10%">
        <form class="text-center" method="POST" action="{{route('admin.training.episode.new')}}" enctype="multipart/form-data">
            @csrf
            <div class="py-2 text-left">
                <label for="event_name" class="uppercase block text-xs mb-2">Episode Title</label>
                <input type="text" class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Episode title" name="title" required/>
            </div>

            <div class="py-2 text-left">
                <label for="event_name" class="uppercase block text-xs mb-2">Episode URL</label>
                <input type="url" class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Episode URL" name="url" required/>
            </div>

            <div class="py-2 text-left">
                <label for="event_name" class="uppercase block text-xs mb-2">Episode Material (PDF ONLY: Accepts multiple files.)</label>
                <input type="file" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Material" name="material[]" multiple accept="application/pdf"/>
            </div>
            <input type="hidden" name="training" value="{{$training->id}}">

            <div class="py-2 mt-6">
                <button type="submit" class="border-2 text-sm border-gray-100 focus:outline-none bg-indigo-800 text-white font-medium uppercase tracking-wider block w-3/4 md:w-1/2  m-auto py-4 rounded-lg focus:border-gray-700 hover:bg-purple-700">
                    Add Episode
                </button>
            </div>
        </form>
    </div>

    <!-- Modal HTML embedded directly into document -->
    <div id="trainingModal" class="modal" style="width: 75%; max-width: 75%; padding: 5% 10%">
        <form class="text-center" method="POST" action="{{route('admin.training.update')}}" enctype="multipart/form-data">
            @csrf

            <div class="py-2 text-left">
                <label for="event_name" class="uppercase block text-xs mb-2">Training Title</label>
                <input type="text" class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Training title " name="title" value="{{$training->name}}" required/>
            </div>

            <div class="py-2 text-left">
                <label for="event_name" class="uppercase block text-xs mb-2">Training Description</label>
                <textarea cols="30" rows="4" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-8 rounded-lg focus:border-gray-700" placeholder="Training Description" name="description" required>{{$training->description}}</textarea>
            </div>

            <div class="py-2 text-left">
                <label for="event_name" class="uppercase block text-xs mb-2">Banner</label>
                <input type="file" class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Thumbnail" name="banner" accept="image/*"/>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
                <div class="py-2 text-left">
                    <label for="event_name" class="uppercase block text-xs mb-2">Start Date</label>
                    <input type="date" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="State Date" name="start_date" value="{{$training->start_date}}" required/>
                </div>

                <div class="py-2 text-left">
                    <label for="event_name" class="uppercase block text-xs mb-2">Start Time</label>
                    <input type="time" class="border text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Start Time" name="start_time" value="{{$training->start_time}}" required/>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
                <div class="py-2 text-left">
                    <label for="event_name" class="uppercase block text-xs mb-2">End Date</label>
                    <input type="date" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="End date" name="end_date" value="{{$training->end_date}}" required/>
                </div>

                <div class="py-2 text-left">
                    <label for="event_name" class="uppercase block text-xs mb-2">End Time</label>
                    <input type="time" class="border text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700" placeholder="End Time" name="end_time" value="{{$training->end_time}}" required/>
                </div>
            </div>
            <input type="hidden" name="id" value="{{$training->id}}">
            <div class="py-2 mt-6">
                <button type="submit" class="border-2 text-sm border-gray-100 focus:outline-none bg-indigo-800 text-white font-medium uppercase tracking-wider block w-3/4 md:w-1/2  m-auto py-4 rounded-lg focus:border-gray-700 hover:bg-purple-700">
                    Update Training
                </button>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script>
        document.getElementById('training').classList.add('active');
    </script>
@endsection
