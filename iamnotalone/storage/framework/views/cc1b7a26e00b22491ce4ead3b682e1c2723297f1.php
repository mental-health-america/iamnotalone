<header class="w-full mx-auto py-6 mb-8">
    <span x-data="{ dropdownOpen: false }" class="float-right mt-2">
        <button @click="dropdownOpen = !dropdownOpen" class="p-2 focus:outline-none">
            <span class="mx-6 font-bold">
                <?php echo e(Auth::user()->first_name); ?>

            </span>
            
            <svg class="inline h-5 w-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>

        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

        <div x-show="dropdownOpen" class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
            <a href="#" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                your profile
            </a>
            <a href="#" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                Settings
            </a>
            <a href="<?php echo e(route('signout')); ?>" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                Sign Out
            </a>
        </div>
    </span>

    <img src="<?php echo e(asset('images/vectors/user.jpg')); ?>" class="w-12 float-right rounded-2xl" alt="">

    <span class="float-right mr-12 mt-3">
        <svg width="22" height="27" viewBox="0 0 22 27" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20.9267 24.6524L19.2111 21.4223C18.4189 19.9314 17.997 18.2238 17.997 16.4898V13.6614C17.997 10.093 15.883 7.07427 12.9956 6.10153V4.07674C13.0003 2.82909 12.1003 1.81934 10.9988 1.81934C9.89725 1.81934 8.99727 2.82909 8.99727 4.07674V6.10153C6.10984 7.07427 4.00052 10.093 4.00052 13.6614V16.4898C4.00052 18.2291 3.58334 19.9314 2.79118 21.4223L1.07091 24.6471C0.97716 24.8216 0.97716 25.0383 1.06622 25.2181C1.15528 25.3925 1.31934 25.5036 1.50215 25.5036H20.5001C20.6782 25.5036 20.847 25.3925 20.936 25.2181C21.0251 25.0436 21.0204 24.8216 20.9267 24.6524Z" stroke="#768492" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
    </span>
</header><?php /**PATH /home/iamnotalone/public_html/iamnotalone/resources/views/admin/partials/header.blade.php ENDPATH**/ ?>