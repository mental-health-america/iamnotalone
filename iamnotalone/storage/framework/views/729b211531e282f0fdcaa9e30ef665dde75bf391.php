<nav class="flex items-center flex-wrap mb-10 mt-2">
    <a href="/" class="p-2 mx-4 inline-flex items-center">
      <!--<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fill-current text-white h-8 w-8 mr-2">
        <path d="M12.001 4.8c-3.2 0-5.2 1.6-6 4.8 1.2-1.6 2.6-2.2 4.2-1.8.913.228 1.565.89 2.288 1.624C13.666 10.618 15.027 12 18.001 12c3.2 0 5.2-1.6 6-4.8-1.2 1.6-2.6 2.2-4.2 1.8-.913-.228-1.565-.89-2.288-1.624C16.337 6.182 14.976 4.8 12.001 4.8zm-6 7.2c-3.2 0-5.2 1.6-6 4.8 1.2-1.6 2.6-2.2 4.2-1.8.913.228 1.565.89 2.288 1.624 1.177 1.194 2.538 2.576 5.512 2.576 3.2 0 5.2-1.6 6-4.8-1.2 1.6-2.6 2.2-4.2 1.8-.913-.228-1.565-.89-2.288-1.624C10.337 13.382 8.976 12 6.001 12z"/>
      </svg>
      <span class="text-xl text-white font-bold uppercase tracking-wide">Talwind CSS</span>-->
        <img class="block h-14 md:h-20 w-auto" src="<?php echo e(asset('images/logo.png')); ?>" alt="HMS Logo">
    </a>

    <button class="text-white inline-flex p-3 mr-4 bg-gray-900 rounded lg:hidden ml-auto hover:text-white outline-none nav-toggler" data-target="#navigation">
        <i class="material-icons">menu</i>
    </button>
    <div class="hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto" id="navigation">
        <div class="lg:inline-flex lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start px-2 py-4 flex flex-col lg:h-auto bg-gray-900 md:bg-white lg:mr-6">
          <a id="home" href="/" class="lg:inline-flex lg:w-auto w-full px-4 py-2 rounded text-white md:text-black uppercase items-center justify-center hover:bg-indigo-500 hover:text-white">
            <span>Home</span>
          </a>
          <a id="events" href="<?php echo e(route('event.new')); ?>" class="lg:inline-flex lg:w-auto w-full px-4 py-2 rounded text-white md:text-black text-sm font-medium uppercase items-center justify-center hover:bg-indigo-500 hover:text-white">
            <span>Create Event</span>
          </a>
          <div @click.away="open = false" class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="lg:inline-flex lg:w-auto w-full px-4 py-2 rounded text-white md:text-black text-sm uppercase items-center justify-center hover:bg-indigo-400 hover:text-white">
              <span id="forums">Forums</span>
              <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute z-10 left-0.5 right-0 w-36 mt-2 ml-2 origin-top-right rounded-md shadow-lg md:w-48">
              <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                <a class="block text-center px-2 py-2 mt-2 text-sm  bg-transparent rounded-lg  hover:text-white focus:text-gray-900 hover:bg-indigo-400 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="<?php echo e(route('forum')); ?>">General Forum</a>
                <a class="block text-center px-2 py-2 mt-2 text-sm  bg-transparent rounded-lg  hover:text-white focus:text-gray-900 hover:bg-indigo-400 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="<?php echo e(route('peers.forum')); ?>">Peers Forum</a>
              </div>
            </div>
          </div>
          <a href="<?php echo e(route('donate')); ?>" class="lg:inline-flex bg-yellow-600 hover:bg-yellow-400 md:w-auto w-auto mx-4 my-2 px-4 py-2 rounded text-white text-sm font-medium uppercase items-center justify-center hover:bg-gray-900 hover:text-white">
            <span>Donate</span>
          </a>
        </div>
    </div>
</nav><?php /**PATH /home/iamnotalone/public_html/iamnotalone/resources/views/partials/header.blade.php ENDPATH**/ ?>