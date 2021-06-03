<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>MHA Admin</title>
    @notifyCss
    <link rel="shortcut icon" href="{{asset('images/logo.png')}}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet"/>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @yield('css')
  </head>
  <body>
    <div class="h-screen flex flex-row">
	
      @include('admin.partials.sidebar')
      <main class="flex flex-col w-5/6 px-10 bg-gray-200 dark:bg-gray-900  pb-20 overflow-y-auto transition duration-500 ease-in-out ">
          @include('admin.partials.header')
          @yield('content')

          <!-- Modal HTML embedded directly into document -->
        <div id="disapproveModal" class="modal" style="width: 75%; max-width: 75%; padding: 5% 10%">
          <form class="text-center" method="POST" action="{{route('admin.message.send')}}">
                @csrf
                <h4 class="font-medium uppercase tracking-wider text-lg mb-10 w-full">
                    Message to let <span id="ofn"></span> know why this event is not being approved.
                </h4>
                <div class="py-2 text-left">
                    <label for="event_name" class="uppercase block text-xs mb-2">Organizer</label>
                    <input type="text" class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Organizer" name="organizer" readonly id="organizer"/>
                </div>
                
                <div class="py-2 text-left">
                    <label for="event_name" class="uppercase block text-xs mb-2">Message</label>
                    <textarea cols="30" rows="4" id="editor" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-8 rounded-lg focus:border-gray-700" placeholder="Message..." name="msg" autofocus required></textarea>
                </div>
                <input type="hidden" name="uid" id="uid">
                <input type="hidden" name="eid" id="eid">
                <div class="py-2 mt-6">
                    <button type="submit" class="border-2 text-sm border-gray-100 focus:outline-none bg-indigo-800 text-white font-medium uppercase tracking-wider block w-3/4 md:w-1/2  m-auto py-4 rounded-lg focus:border-gray-700 hover:bg-purple-700">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
      </main> 
    </div>
    <x:notify-messages />
    @notifyJs
  </body>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine.js" integrity="sha512-nIwdJlD5/vHj23CbO2iHCXtsqzdTTx3e3uAmpTm4x2Y8xCIFyWu4cSIV8GaGe2UNVq86/1h9EgUZy7tn243qdA==" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
      <script src="{{asset('js/search_table.js')}}"></script>
      <script src="{{asset('js/table_options.js')}}"></script>
      <script src="{{asset('js/load_modal.js')}}"></script>
      @yield('js')
</html>

