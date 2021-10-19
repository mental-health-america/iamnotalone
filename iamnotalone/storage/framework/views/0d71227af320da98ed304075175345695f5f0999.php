<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@iconscout/unicons@3.0.6/css/line.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="w-full mx-auto">
            <div class="flex flex-col">
                <div class="">
                    <img class="object-cover h-auto md:h-96 w-full rounded-xl" alt="Event title" src="<?php echo e(asset($event->banner)); ?>">
                </div>
            </div>
            <div class="md:w-3/4 px-4 my-8"> 
                <h1 class="mt-4 text-2xl md:text-3xl font-medium text-indigo-800 transition duration-150 hover:text-gray-600">
                    <?php echo e($event->name); ?>

                </h1>
                <p class="my-8 w-full md:w-4/5 text-sm text-gray-600">
                    <?php echo e($event->description); ?>

                </p>
                 <p> <b>Organizer:</b> <?php echo e($event->organizer->first_name.' '.$event->organizer->last_name); ?></p>
                <?php if($event->peers): ?>
                    <span class="px-8 py-3 text-sm bg-green-200 rounded-lg text-center text-gray-600 font-bold inline-block">
                        This event is for peers only <span class="uil-smile-squint-wink-alt"></span>
                    </span>
                <?php endif; ?>    
            </div>
            <div class="flex flex-flex flex-col md:flex-row mb-4 pl-4">
                <div class="pr-10">
                    <?php if($event->inperson): ?>
                        <p class="text-sm text-gray-600 font-semibold mb-4"> <span class="uil uil-map-marker text-lg"></span> <?php echo e($event->venue.', '.$event->address1.'. '. $event->city.', '.$event->state); ?> </p>
                    <?php endif; ?>
                    <?php if($event->online): ?>
                        <p class="text-sm text-gray-600 mb-4 font-semibold"> <?php echo e($event->platform); ?> <span class="uil uil-link text-lg"></span> <?php if($event->link): ?>
                    <a href="<?php echo e($event->link); ?>"><?php echo e($event->link); ?></a> 
                    <?php endif; ?>
                    <?php if($event->registration_link): ?>
                    <a href="<?php echo e($event->registration_link); ?>"><?php echo e($event->registration_link); ?></a>
                    <?php endif; ?> </p>
                    <?php endif; ?>
                    <p class="text-sm text-yellow-500 font-semibold"> <span class="uil uil-clock text-lg text-black"></span> <?php echo e(\Carbon\Carbon::parse($event->start_date)->format('l')); ?>, <?php echo e(date('h:i:s a', strtotime($event->start_time))); ?> PDT</p>
                    <p class="text-gray-600 mt-4">Disability Accomodations</p>
                    <?php if(count($accomodations)): ?>
                        <ul class="pl-8 list-disc inline-block">
                            <?php $__currentLoopData = $accomodations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accomodation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($accomodation->accomodation); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php else: ?>
                        <ul class="pl-8 list-disc inline-block">
                            <li>None</li>
                        </ul>
                    <?php endif; ?>  
                </div>
            </div>
            <?php if(!$event->approved): ?>
                <div class="flex flex-row mt-4 mb-8 px-40">
                    <a href="<?php echo e(route('admin.event.approve', ['id'=>$event->id])); ?>" id="register" class="py-2 px-12 w-1/2 bg-indigo-800 mr-2 hover:bg-gray-100 hover:text-gray-800 hover:border-2 hover:border-indigo-800 border-2 focus:ring-indigo-500 flex-nowrap focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                        Approve <i class="uil uil-check"></i>
                    </a>

                    <a href="#disapproveModal" rel="modal:open" id="register" class="py-2 px-12 bg-gray-100 text-gray-800 ml-2 hover:bg-indigo-700 hover:text-white border-2 border-indigo-600 focus:ring-indigo-500 flex-nowrap focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                        Disapprove <i class="uil uil-cancel"></i>
                    </a>
                    <div></div>
                </div>
            <?php endif; ?>

            <?php if($event->approved): ?>
                <a id="delete" href="#" class="py-2 px-12 bg-red-600 text-white ml-2 hover:bg-indigo-700 hover:text-white border-2 border-indigo-600 focus:ring-indigo-500 flex-nowrap focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                    Delete <i class="uil uil-cancel"></i>
                </a>
                <div></div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Modal HTML embedded directly into document -->
    <div id="disapproveModal" class="modal" style="width: 75%; max-width: 75%; padding: 5% 10%">
       <form class="text-center" method="POST" action="<?php echo e(route('admin.message.send')); ?>">
            <?php echo csrf_field(); ?>
            <h4 class="font-medium uppercase tracking-wider text-lg mb-10 w-full">
                Message to let <?php echo e($event->organizer->first_name); ?> know why this event is not being approved.
            </h4>
            <div class="py-2 text-left">
                 <label for="event_name" class="uppercase block text-xs mb-2">Organizer</label>
                <input type="text" class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Organizer" name="organizer" readonly required value="<?php echo e($event->organizer->first_name.' '.$event->organizer->last_name); ?>"/>
            </div>
            
            <div class="py-2 text-left">
                <label for="event_name" class="uppercase block text-xs mb-2">Message</label>
                <textarea cols="30" rows="4" id="editor" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-8 rounded-lg focus:border-gray-700" placeholder="Message..." name="msg" autofocus required></textarea>
            </div>
            <input type="hidden" name="uid" value="<?php echo e($event->organizer->id); ?>">
            <input type="hidden" name="eid" value="<?php echo e($event->id); ?>">
            <div class="py-2 mt-6">
                <button type="submit" class="border-2 text-sm border-gray-100 focus:outline-none bg-indigo-800 text-white font-medium uppercase tracking-wider block w-3/4 md:w-1/2  m-auto py-4 rounded-lg focus:border-gray-700 hover:bg-purple-700">
                    Send Message
                </button>
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <?php if($event->approved == 1): ?>
        <script>
            document.getElementById("approved").classList.add('active');
        </script>
    <?php elseif(!$event->approved): ?>
        <script>
            document.getElementById("pending").classList.add('active');
        </script>
    <?php endif; ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $("#delete").click(function () {

            Swal.fire({
                title: '',
                icon: 'info',
                html:'Are you sure you want to delete this event?',
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
                    window.location.href = "<?php echo e(route('admin.training.remove', ['id'=>$event->id])); ?>";
                } else if (result.isDenied) {
                    Swal.fire('Ok, cool', '', 'info')
                }
            });
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iamnotalone/public_html/iamnotalone/resources/views/admin/event_details.blade.php ENDPATH**/ ?>