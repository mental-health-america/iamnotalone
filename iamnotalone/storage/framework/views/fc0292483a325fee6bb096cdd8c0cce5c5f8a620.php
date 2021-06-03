<?php $__env->startSection('content'); ?>
    div class="container">
        <div class="md:w-4/6 mx-auto">
            <div class="flex flex-col">
                <div class="">
                    <img class="object-cover h-auto md:h-96 w-full rounded-xl" alt="Event title" src="<?php echo e(asset('images/events/event5.png')); ?>">
                </div>
            </div>
            <div class="md:w-3/4 px-4 my-8">
                <h1 class="mt-4 text-2xl md:text-3xl font-medium text-indigo-400 transition duration-150 hover:text-gray-600">
                    <?php echo e($event->name); ?>

                </h1>
                <p class="my-4 w-full md:w-4/5 text-sm text-gray-600">
                    <?php echo e($event->description); ?>

                </p>
               <?php if($event->inperson): ?>
                    <p class="text-sm text-gray-600 my-2"> <span class="uil uil-map-marker text-lg"></span> <?php echo e($event->venue.', '.$event->address1.'. '. $event->city.', '.$event->state); ?> </p>
                <?php endif; ?>
                <?php if($event->online): ?>
                    <p class="text-sm text-gray-600 my-4"> <?php echo e($event->platform); ?> <span class="uil uil-link text-lg"></span> <a href="<?php echo e($event->link); ?>"><?php echo e($event->link); ?></a> </p>
                <?php endif; ?>
                <p class="text-sm text-yellow-500 my-2"> <span class="uil uil-clock text-lg text-black"></span> <?php echo e(\Carbon\Carbon::parse($event->start_date)->format('l')); ?>, <?php echo e(date('h:i:s a', strtotime($event->start_time))); ?> PDT</p>

                <p class="mt-6">
                    <a href="#" id="register" class="py-3 px-12 bg-indigo-400 hover:bg-indigo-700 focus:ring-indigo-500 flex-nowrap focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                        Register <i class="uil uil-check"></i>
                    </a>
                </p>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iamnotalone/public_html/iamnotalone/resources/views/admin/admin_details.blade.php ENDPATH**/ ?>