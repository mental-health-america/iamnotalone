<?php $__env->startSection('content'); ?>

<section class="px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="text-left">
        <h2 class="text-xl font-bold text-indigo-400 uppercase">Registered Events</h2>
    </div>

    <?php if(!count($events)): ?>
        <p class="text-lg mt-4 text-gray-600"> You have not registered for any events at the moment.</p>
    <?php else: ?>
        <div class="grid gap-6 mx-auto mt-12 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 w-full">
            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex flex-col overflow-hidden rounded-lg shadow-lg lg:col-span-1 mb-5">
                    <div class="flex-shrink-0">
                        <a href="<?php echo e(route('event.details', ['id'=>$event->event->id])); ?>">
                            <img src="<?php echo e(asset('images/events/event1.png')); ?>" alt="" class="object-cover w-full h-48">
                        </a>
                    </div>

                    <div class="flex flex-col justify-between flex-1 p-5">
                        <div class="flex-1">
                            <a href="<?php echo e(route('event.details', ['id'=>$event->event->id])); ?>">
                                <h5 class="mt-2 text-lg font-semibold leading-7 text-indigo-400 transition duration-150 hover:text-gray-600">
                                    <?php echo e($event->event->name); ?>

                                </h5>
                            </a>
                            <p class="mt-3 text-sm text-gray-600">
                                <?php echo e(substr($event->description, 0, 100)); ?>...
                            </p>
                        </div>

                        <div class="mt-6">
                            <div class="flex items-center">
                                <div class="text-sm text-gray-500">
                                    <p class="text-yellow-600">
                                        <?php echo e(\Carbon\Carbon::parse($event->event->start_date)->format('l')); ?>, <?php echo e(date('h:i:s a', strtotime($event->event->start_time))); ?> PDT
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</section>

<?php if(Auth::user()->organizer): ?>
    <section class="px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="text-left">
            <h2 class="text-xl font-bold text-indigo-400 uppercase">Organized Events</h2>
        </div>

        <?php if(!count($oevents)): ?>
            <p class="text-lg mt-4 text-gray-600"> You have not Organized any events at the moment.</p>
        <?php else: ?>
            <div class="grid gap-6 mx-auto mt-12 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 w-full">
                <?php $__currentLoopData = $oevents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex flex-col overflow-hidden rounded-lg shadow-lg lg:col-span-1 mb-5">
                        <div class="flex-shrink-0">
                            <a href="<?php echo e(route('event.details', ['id'=>$event->id])); ?>">
                                <img src="<?php echo e(asset('images/events/event1.png')); ?>" alt="" class="object-cover w-full h-48">
                            </a>
                        </div>

                        <div class="flex flex-col justify-between flex-1 p-5">
                            <div class="flex-1">
                                <a href="<?php echo e(route('event.details', ['id'=>$event->id])); ?>">
                                    <h5 class="mt-2 text-lg font-semibold leading-7 text-indigo-400 transition duration-150 hover:text-gray-600">
                                        <?php echo e($event->name); ?>

                                    </h5>
                                </a>
                                <p class="mt-3 text-sm text-gray-600">
                                    <?php echo e(substr($event->description, 0, 100)); ?> 
                                </p>
                            </div>

                            <div class="mt-6">
                                <div class="flex items-center">
                                    <div class="text-sm text-gray-500">
                                        <p class="text-yellow-600">
                                            <?php echo e(\Carbon\Carbon::parse($event->start_date)->format('l')); ?>, <?php echo e(date('h:i:s a', strtotime($event->start_time))); ?> PDT
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </section>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        document.getElementById("events").classList.add('link-active');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iamnotalone/public_html/iamnotalone/resources/views/user_events.blade.php ENDPATH**/ ?>