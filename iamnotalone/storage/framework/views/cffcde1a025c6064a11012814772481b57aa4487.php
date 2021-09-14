<?php if (isset($component)) { $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\GuestLayout::class, []); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <div class="container" style="justify-content: center;display: flex;padding-top: 168px;">
        <div class="row justify-content-center" style="--tw-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    box-shadow: tomato;
    padding-top: 14px;
    background-color: ghostwhite;">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" style="background-color: ghostwhite; max-width:425px">

                <form method="POST" action="<?php echo e(route('password.update')); ?>" style="padding: 20px;">
                    <?php echo csrf_field(); ?>
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="<?php echo e($token); ?>">
                    <!-- Email Address -->
                    <div>
                        <label class="block font-medium text-sm text-gray-700" for="email" style="padding: 4px;">
                            Email
                        </label>

                        <input
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full form-control"
                            id="email" type="email" name="email" required="required" autofocus="autofocus" style="padding: 10px;width: 95%;" value= <?php echo e(request()->get('email')); ?> readonly>
                        <?php if($errors->has('email')): ?>
                        <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                        <?php endif; ?>
                        <div style="padding-top:20px;">
                        <label class="block font-medium text-sm text-gray-700" for="password" style="padding: 4px;">
                            Password
                        </label>
                        <input
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full form-control"
                            id="password" type="password" name="password" required="required" autofocus="autofocus" style="padding: 10px;width: 95%;" autofocus>
                        </div>
                        <?php if($errors->has('password')): ?>
                            <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div style="padding-top:20px;">
                        <label class="block font-medium text-sm text-gray-700" for="password" style="padding: 4px;">
                            Confirm Password
                        </label>
                        <input
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full form-control"
                            id="password_confirmation" type="password" name="password_confirmation" required="required" autofocus="autofocus" style="padding: 10px;width: 95%;">
                        </div>
                        
                    </div>

                    <div class="flex items-center justify-end mt-4" style="padding: 26px 0px 0px 98px;">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" style="padding: 7px;">
                            <?php echo e(__('Reset Password')); ?>

                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 <?php if (isset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015)): ?>
<?php $component = $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015; ?>
<?php unset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH /home/iamnotalone/public_html/iamnotalone/resources/views/auth/reset-password.blade.php ENDPATH**/ ?>