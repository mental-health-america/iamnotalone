<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.5/awesomplete.css">
    <style>
        .awesomplete{
            width: 100%
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="flex flex-col">
        <div class="flex flex-1 items-center justify-center">
            <div class="px-4 sm:px12 md:px-24 pb-16 lg:max-w-3xl sm:max-w-md w-full text-center">
                <form class="text-center" method="POST" action="<?php echo e(route('signup')); ?>">
                    <?php echo csrf_field(); ?>
                    <h1 class="font-medium uppercase tracking-wider text-2xl mb-10 w-full">
                        Create your account
                    </h1>

                    <div class="grid grid-cols-1 md:grid-cols-2 md:gap-4">
                        <div class="py-2 text-left">
                            <input type="text" class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="First Name" name="first_name" value="<?php echo e(old('first_name', '')); ?>" required/>
                            <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p> <small><?php echo e($message); ?></small> </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="py-2 text-left">
                            <input type="text" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Last Name" name="last_name" value="<?php echo e(old('first_name', '')); ?>" required/>
                            <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p> <small><?php echo e($message); ?></small> </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 md:gap-4">
                        <div class="py-2 text-left">
                            <input type="text" class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Pronouns" name="pronoun" value="<?php echo e(old('pronoun', '')); ?>" required/>
                            <?php $__errorArgs = ['pronoun'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-xs "> <small><?php echo e($message); ?></small> </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="py-2 text-left">
                            <input type="tel" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Phone Number" name="phone" value="<?php echo e(old('phone', '')); ?>" required/>
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-xs "> <small><?php echo e($message); ?></small> </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="py-2 text-left">
                        <input type="email" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Email Adress" name="email" value="<?php echo e(old('email', '')); ?>" required/>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-xs "> <small><?php echo e($message); ?></small> </p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="py-2 text-left">
                        <input type="text" class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="State" id="state" name="state" value="<?php echo e(old('state', '')); ?>" required autocomplete="off"/>
                        <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-xs "> <small><?php echo e($message); ?></small> </p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
            
                    <div class="grid grid-cols-1 md:grid-cols-2 md:gap-4">
                        <div class="flex flex-wrap items-stretch border-2   border-gray-100 w-full relative h-15 bg-white  rounded-lg  items-center rounded mb-4">
                            <input type="password" class="flex-shrink p-4 focus:outline-none flex-grow flex-auto text-sm w-px flex-1 relative self-center focus:border-gray-700" autocomplete="off" id="password" placeholder="Password" minlength="7" name="password" required/>
                            <div class="flex -mr-px">
                                <span class="flex items-center leading-normal bg-white rounded rounded-l-none border-0 px-3 whitespace-no-wrap text-gray-600">
                                <i onclick="showHidePassword('password', 'passIcon')" id="passIcon" class="uil uil-eye-slash"></i>
                                </span>
                            </div>
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-xs"> <small><?php echo e($message); ?></small> </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="flex flex-wrap items-stretch border-2   border-gray-100 w-full relative h-15 bg-white  rounded-lg  items-center rounded mb-4">
                            <input type="password" class="flex-shrink p-4 focus:outline-none flex-grow flex-auto text-sm w-px flex-1 relative self-center focus:border-gray-700" autocomplete="off" placeholder="Confirm Password" minlength="7" name="password_confirmation" required id="confirm_password"/>
                            <div class="flex -mr-px">
                                <span class="flex items-center leading-normal bg-white rounded rounded-l-none border-0 px-3 whitespace-no-wrap text-gray-600">
                                <i onclick="showHidePassword('confirm_password', 'conpassIcon')" id="conpassIcon" class="uil uil-eye-slash"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="py-2 mt-6">
                        <button type="submit" class="uppercase border-2 text-xs border-gray-100 focus:outline-none bg-primary text-white font-semibold tracking-wider block w-3/4 md:w-1/2 m-auto py-4 rounded-lg focus:border-gray-700 hover:bg-purple-700">
                            Get Started
                        </button>
                    </div>
                </form>
                <div class="text-center mt-4 capitalize text-sm">
                    <span>
                        Already a Member?
                    </span>
                    <a href="<?php echo e(route('login')); ?>" class="font-light font-bold hover:text-indigo-800">Login</a>
                </div>

                <div class="text-center mt-6 text-justify w-2/3 m-auto">
                    <p class="text-xs">By clicking “Get Started”, I have read and accepted the I am not alone Terms Of Service, Community Guidelines.</p>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        document.getElementById("register").classList.add('link-active');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.5/awesomplete.js"></script>
    <script>
        var input2 = document.getElementById("state");
        new Awesomplete(input2, {
            list: ['Alabama','Alaska','American Samoa','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','District of Columbia','Federated States of Micronesia','Florida','Georgia','Guam','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Marshall Islands','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Northern Mariana Islands','Ohio','Oklahoma','Oregon','Palau','Pennsylvania','Puerto Rico','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virgin Island','Virginia','Washington','West Virginia','Wisconsin','Wyoming']
        });
    </script>
        <script src="<?php echo e(asset('js/reveal_hide_password.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iamnotalone/public_html/iamnotalone/resources/views/register.blade.php ENDPATH**/ ?>