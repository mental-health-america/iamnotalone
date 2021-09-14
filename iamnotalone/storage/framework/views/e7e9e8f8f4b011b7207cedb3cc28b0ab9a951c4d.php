<?php $__env->startSection('content'); ?>
    <section class="flex flex-col">
        <div class="flex flex-1 items-center justify-center">
            <div class="px-4 lg:px-24 py-16 lg:max-w-3xl sm:max-w-md w-full text-center">
                <form class="text-center" method="POST" action="<?php echo e(route('auth')); ?>">
                    <?php echo csrf_field(); ?>
                    <h1 class="font-medium uppercase tracking-wider text-2xl mb-10 w-full">
                        Login to your account
                    </h1>
                    <div class="py-2 text-left">
                        <input type="email" class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Email Address" name="email" required autofocus value="<?php echo e(old('email', '')); ?>" autofocus autocomplete="off"/>
                    </div>
                    <div class="flex flex-wrap items-stretch border-2   border-gray-100 w-full relative h-15 bg-white  rounded-lg  items-center rounded mb-4">
                        <input type="password" id="password" class="flex-shrink p-4 focus:outline-none flex-grow flex-auto text-sm w-px flex-1 relative self-center focus:border-gray-700" placeholder="Password" name="password" required/>
                        <div class="flex -mr-px">
                            <span class="flex items-center leading-normal bg-white rounded rounded-l-none border-0 px-3 whitespace-no-wrap text-gray-600">
                               <i onclick="showHidePassword('password', 'passIcon')" id="passIcon" class="uil uil-eye-slash"></i>
                            </span>
                        </div>
                    </div>
                    <div class="py-2 mt-6">
                        <button type="submit" class="border-2 text-sm border-gray-100 focus:outline-none bg-primary text-white font-semibold tracking-wider block w-3/4 md:w-1/2  m-auto py-4 rounded-lg focus:border-gray-700 hover:bg-purple-700">
                            Login
                        </button>
                    </div>
                </form>
                <div class="text-center">
                    <a href="<?php echo e(route('password.request')); ?>" class="hover:underline">Forgot password?</a>
                </div>
                <div class="text-center mt-4 capitalize text-sm">
                    <span>
                        Not yet a member?
                    </span>
                    <a href="<?php echo e(route('register')); ?>" class="font-light font-bold hover:text-indigo-800">Sign Up</a>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        document.getElementById("login").classList.add('link-active');
    </script>
    <script src="<?php echo e(asset('js/reveal_hide_password.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iamnotalone/public_html/iamnotalone/resources/views/login.blade.php ENDPATH**/ ?>