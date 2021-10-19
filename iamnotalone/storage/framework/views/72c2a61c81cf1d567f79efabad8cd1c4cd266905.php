<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="md:w-4/6 mx-auto">
            <div class="flex flex-col">
                <div class="">
                    <img class="object-cover h-auto md:h-96 w-full rounded-xl" alt="Event title" src="<?php echo e(asset($event->banner)); ?>">
                </div>
            </div>
            <div class="px-8 my-8">
                <h1 class="mt-4 text-2xl md:text-3xl font-medium text-indigo-400 transition duration-150 hover:text-gray-600">
                    <?php echo e($event->name); ?>

                </h1>
                <p class="my-4 w-full text-sm text-justify text-gray-600">
                    <?php echo e($event->description); ?>

                </p>
                <?php if($event->peers): ?>
                    <span class="px-8 py-3 text-sm bg-green-200 rounded-lg text-center text-gray-600 font-bold inline-block">
                        This event is for peers only <span class="uil-smile-squint-wink-alt"></span>
                    </span>
                <?php endif; ?>
               <?php if($event->inperson): ?>
                    <p class="text-sm text-gray-600 my-2 font-semibold"> <span class="uil uil-map-marker text-lg"></span> <?php echo e($event->venue.', '.$event->address1.'. '. $event->city.', '.$event->state); ?> </p>
                <?php endif; ?>
                <?php if($event->online): ?>
                    <p class="text-sm text-gray-600 my-4 font-semibold"> <?php echo e($event->platform); ?> <span class="uil uil-link text-lg"></span> 
                    <?php if($event->link): ?>
                    <a href="<?php echo e($event->link); ?>"><?php echo e($event->link); ?></a> 
                    <?php endif; ?>
                    <?php if($event->registration_link): ?>
                    <a href="<?php echo e($event->registration_link); ?>"><?php echo e($event->registration_link); ?></a>
                    <?php endif; ?>
                    </p>
                <?php endif; ?>
               
                <p class="text-gray-600 mt-4 text-sm">Disability Accomodations</p>
                <?php if(count($accomodations)): ?>
                    <ul class="pl-8 list-disc inline-block text-sm">
                        <?php $__currentLoopData = $accomodations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accomodation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($accomodation->accomodation); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php else: ?>
                    <ul class="pl-8 list-disc inline-block text-sm">
                        <li>None</li>
                    </ul>
                <?php endif; ?>  
               
                <p class="text-sm text-yellow-500 my-4 font-semibold"> <span class="uil uil-clock text-lg text-black"></span> <?php echo e(\Carbon\Carbon::parse($event->start_date)->format('l')); ?>, <?php echo e(date('h:i:s a', strtotime($event->start_time))); ?> EST</p>

                <p class="mt-12">
                    <a href="#" id="register" class="py-3 px-12 bg-primary hover:bg-indigo-700 focus:ring-indigo-500 flex-nowrap focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                        Register <i class="uil uil-check"></i>
                    </a>
                </p>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        document.getElementById("events").classList.add('link-active');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $("#register").click(function () {

            Swal.fire({
                title: '',
                icon: 'info',
                html:'Do you want to register for this event?',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText:
                    '<i class="fa fa-thumbs-up"></i> Yes!',
                confirmButtonAriaLabel: 'Thumbs up, great!',
                cancelButtonText:
                    '<i class="fa fa-thumbs-down"></i> No!',
                cancelButtonAriaLabel: 'Thumbs down'
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.href = "<?php echo e(route('event.register', ['id'=>$event->id])); ?>";
                } else if (result.isDenied) {
                    Swal.fire('Ok, cool', '', 'info')
                }
            });
        })
    </script>
<?php echo $__env->yieldSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iamnotalone/public_html/iamnotalone/resources/views/event.blade.php ENDPATH**/ ?>