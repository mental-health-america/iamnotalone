<?php $__env->startSection('content'); ?>
    <div class="flex flex-row mt-4 justify-items-center">
        <div class="bg-white w-1/5 text-center mx-auto py-10 rounded-lg">
            <h1 class="font-medium text-3xl font-bold mb-4"><?php echo e($pendingEvents); ?></h1>
            <p class="uppercase text-xs">Pending Event Request</p>
        </div>

        <div class="bg-white w-1/5 text-center mx-auto py-10 rounded-lg">
            <h1 class="font-medium text-3xl font-bold mb-4"><?php echo e($approvedEvents); ?></h1>
            <p class="uppercase text-xs">Approved Events</p>
        </div>

        <div class="bg-white w-1/5 text-center mx-auto py-10 rounded-lg">
            <h1 class="font-medium text-3xl font-bold mb-4"><?php echo e($organizers); ?></h1>
            <p class="uppercase text-xs">Organizers</p>
        </div>

        <div class="bg-white w-1/5 text-center mx-auto py-10 rounded-lg">
            <h1 class="font-medium text-3xl font-bold mb-4"><?php echo e($attendees); ?></h1>
            <p class="uppercase text-xs">Attendees</p>
        </div>
    </div>

    <div class="w-full px-4 justify-items-center mt-8">
        <input type="text" name="" id="search" class="text-center block mx-auto border-2 text-lg font-medium border-gray-100 focus:outline-none block w-full px-10 py-4 rounded-lg focus:border-gray-700" placeholder="Search by Event Name, Event Type, Event Organizer, Location, Status">
    </div>

    
    <div class="mt-8 w-full">
        <table class="table table-auto min-w-full">
            <thead>
                <tr class="text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 text-center">Event Name</th>
                    <th class="py-3 text-center">Event Type</th>
                    <th class="py-3 text-center">Category</th>
                    <th class="py-3 text-center">Organizer</th>
                    <th class="py-3 text-center">Location</th>
                    <th class="py-3 text-center">Status</th>
                    <th></th>
                </tr>
            </thead>

            <tbody class="text-gray-600 text-sm font-medium" id="tbody">
                <?php if(count($events)): ?>
                    <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="bg-white my-3 text-center">
                            <td class="pl-4 py-4 my-2 whitespace-nowrap">
                                <span class=""><?php echo e($event->name); ?></span>
                            </td>
                            <td class="text-center py-4 my-2">
                                <?php if($event->online): ?>
                                    Online
                                <?php elseif($event->inperson): ?>
                                    inperson
                                <?php else: ?>
                                    Hybrid
                                <?php endif; ?>
                            </td>
                            <td class="text-center py-4 my-2">
                                <span><?php echo e($event->category); ?></span>
                            </td>
                            <td class="text-center py-4 my-2">
                                <?php echo e($event->organizer->first_name.' '.$event->organizer->last_name); ?>

                            </td>
                            <td class="text-center py-4 my-2">
                                <?php if($event->online): ?>
                                    <p>
                                        <a href="<?php echo e($event->link); ?>"><?php echo e($event->platform); ?></a>
                                    </p>
                                <?php endif; ?>
                                <?php if($event->inperson): ?>
                                    <p><?php echo e($event->city.', '.$event->state); ?></p>
                                <?php endif; ?>
                                <?php if($event->training): ?>
                                    Youtube
                                <?php endif; ?>
                            </td>
                            <td class="text-center py-4 my-2">
                                <?php if($event->approved == 1): ?>
                                    <span class="text-white bg-green-300 rounded-full py-2 px-4">Approved</span>
                                <?php elseif(!$event->approved): ?>
                                    <span class="text-white font-semibold bg-yellow-300 rounded-full py-2 px-4">Pending</span>
                                <?php else: ?>
                                    <span class="text-white bg-red-600 rounded-full py-2 px-4">Declined</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center py-4 my-2">
                                <div class="relative">
                                    <a href="#" class="relative z-2 block rounded-md bg-white p-2 focus:outline-none" onclick="showHideMenu('op<?php echo e($event->id); ?>')">
                                        <svg width="20" height="4" viewBox="0 0 20 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.81086 3.73333C1.60952 3.73333 0.63564 2.8976 0.63564 1.86667C0.63564 0.835735 1.60952 0 2.81086 0C4.0122 0 4.98608 0.835735 4.98608 1.86667C4.98608 2.8976 4.0122 3.73333 2.81086 3.73333Z" fill="#858585"/>
                                            <path d="M9.95808 3.73333C8.75674 3.73333 7.78286 2.8976 7.78286 1.86667C7.78286 0.835735 8.75674 0 9.95808 0C11.1594 0 12.1333 0.835735 12.1333 1.86667C12.1333 2.8976 11.1594 3.73333 9.95808 3.73333Z" fill="#858585"/>
                                            <path d="M17.1053 3.73333C15.904 3.73333 14.9301 2.8976 14.9301 1.86667C14.9301 0.835735 15.904 0 17.1053 0C18.3066 0 19.2805 0.835735 19.2805 1.86667C19.2805 2.8976 18.3066 3.73333 17.1053 3.73333Z" fill="#858585"/>
                                        </svg>
                                    </a>

                                    <div class="absolute right-0 mt-2 ml-10 w-32 bg-white rounded-md shadow-xl z-20 hidden" id="op<?php echo e($event->id); ?>">
                                        <a href="<?php echo e(route('admin.event.details', ['id'=>$event->id])); ?>" class="block px-2 py-3 rounded text-sm capitalize text-gray-700 bg-gradient-to-r hover:from-purple-400 hover:via-pink-500 hover:to-red-500 hover: hover:text-white">
                                            Event Details
                                        </a>
                                        <?php if(!$event->approved): ?>
                                            <a href="<?php echo e(route('admin.event.approve', ['id'=>$event->id])); ?>" class="block px-2 py-3 rounded text-sm capitalize text-gray-700 bg-gradient-to-r hover:from-purple-400 hover:via-pink-500 hover:to-red-500 hover: hover:text-white">
                                                Approve Event
                                            </a>
                                            <a href="#" id="openModal" 
                                                class="block px-2 py-3 rounded text-sm capitalize text-gray-700 bg-gradient-to-r hover:from-purple-400 hover:via-pink-500 hover:to-red-500 hover: hover:text-white" 
                                                data-fname="<?php echo e($event->organizer->first_name); ?>" data-lname="<?php echo e($event->organizer->last_name); ?>" data-uid="<?php echo e($event->user_id); ?>" data-eid="<?php echo e($event->id); ?>" onclick="openModal(this)">
                                                Delete Event
                                            </a>
                                        <?php endif; ?>
                                        <?php if($event->approved): ?>
                                            <a href="<?php echo e(route('admin.training.remove', ['id'=>$event->id])); ?>" class="block px-2 py-3 rounded text-sm capitalize text-gray-700 bg-gradient-to-r hover:from-purple-400 hover:via-pink-500 hover:to-red-500 hover: hover:text-white">
                                                Delete Event
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr class="bg-white my-3 text-center">
                        <td colspan="7" class="text-center py-4 my-2">There are no registered Events at the moment.</td>
                    </tr>
                <?php endif; ?>
                
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        document.getElementById('dashboard').classList.add('active');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iamnotalone/public_html/iamnotalone/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>