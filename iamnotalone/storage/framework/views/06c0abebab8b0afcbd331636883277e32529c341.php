<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class=" md:w-3/4 lg:w-1/2 mx-auto">
            <div class="flex flex-col">
                <div class="">
                    <img class="object-cover h-auto md:h-96 w-full rounded-xl" alt="Event title" src="<?php echo e(asset('images/events/success.png')); ?>">
                </div>
            </div>
            <div class="my-8 px-8">
                <p class="my-4 w-fulltext-xs text-gray-600">
                    You are successfully registered for <span class="text-indigo-800"><?php echo e($event->name); ?></span>  
                </p>
                <?php if($event->inperson): ?>
                    <p class="text-sm text-gray-600"> <span class="uil uil-map-marker text-lg"></span> <?php echo e($event->venue.', '.$event->address1.'. '. $event->city.', '.$event->state); ?> </p>
                <?php endif; ?>
                <?php if($event->online): ?>
                    <p class="text-sm text-gray-600"> <?php echo e($event->platform); ?> <span class="uil uil-link text-lg"></span> <a href="<?php echo e($event->link); ?>"><?php echo e($event->link); ?></a> </p>
                <?php endif; ?>
                <p class="text-sm text-yellow-500"> <span class="uil uil-clock text-lg text-black"></span> <?php echo e(\Carbon\Carbon::parse($event->start_date)->format('l')); ?>, <?php echo e(date('h:i:s a', strtotime($event->start_time))); ?> PDT</p>
            </div>
            <?php
                $t = date('Ymd', strtotime($event->start_date)).'T'.date('his', strtotime($event->start_time)).'Z/'.date('Ymd', strtotime($event->end_date)).'T'.date('his', strtotime($event->end_time)).'Z';
            ?>
            <div class="flex flex-col sm:flex-row px-4 my-20">
                <?php if($event->training): ?>
                    <a href="<?php echo e(route('event.training.start', ['id'=>$event->id])); ?>" 
                        class="uppercase text-center border sm:mr-2 mb-4 border-gray-600 focus:outline-none bg-indigo-800 text-white font-medium tracking-wider w-full sm:w-1/2 m-auto block py-3 rounded-lg focus:border-gray-700 hover:bg-purple-700">
                        Start Training
                    </a>
                <?php else: ?>
                    <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text=<?php echo e($event->name); ?>&dates=<?php echo e($t); ?>&ctz=America/New_York&details=<?php echo e($event->description); ?>"
                        rel="noopenner noreferer"
                        target="_blank" 
                        class="uppercase text-center border sm:mr-2 mb-4 border-gray-600 focus:outline-none bg-indigo-800 text-white font-medium tracking-wider w-full sm:w-1/2 m-auto block py-3 rounded-lg focus:border-gray-700 hover:bg-purple-700">
                        Add to Calender
                    </a>
                <?php endif; ?>
                <a href="/" class="capitalize text-center border-2  sm:ml-2 mb-4 border-indigo-800 focus:outline-none bg-gray-100 text-black font-medium tracking-wider block w-full sm:w-1/2 m-auto py-3 rounded-lg focus:border-gray-700 hover:bg-purple-700">
                    Return to Homepage
                </a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        document.getElementById("events").classList.add('link-active');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iamnotalone/public_html/iamnotalone/resources/views/registered.blade.php ENDPATH**/ ?>