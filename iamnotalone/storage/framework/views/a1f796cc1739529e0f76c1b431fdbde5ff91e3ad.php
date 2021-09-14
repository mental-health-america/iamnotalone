<?php $__env->startSection('content'); ?>
    <div class="w-full px-4 justify-items-center mt-8">
        <input type="text" name="" id="search" class="block mx-auto border-2 text-lg text-center font-medium border-gray-100 focus:outline-none block w-full px-10 py-3 rounded-lg focus:border-gray-700" placeholder="Search by Activity Name, Activity Type, Activity Organizer, Location, Status">
    </div>

    <div class="px-4 mt-8">
        <a href="#trainingModal" rel="modal:open" class=" md:w-1/4 float-right border-2 text-sm border-gray-100 focus:outline-none bg-blue-900 text-white font-medium uppercase text-center block w-full  m-auto py-4 rounded-lg focus:border-gray-700 hover:bg-blue-800">
            <span class="uil uil-plus"></span>
            Create Training
        </a>
    </div>

    <div class="mt-8 w-full">
        <table class="min-w-max w-full table-auto" id="table">
            <thead>
                <tr class="text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-6 px-6 text-center resize-x">Training Name</th>
                    <th class="py-6 px-6 text-center resize-x">Training Organizer</th>
                    <th class="py-6 px-6 text-center resize-x">Training Status</th>
                    <th class="py-6 px-6 text-center resize-x"></th>
                </tr>
            </thead>

            <tbody class="text-gray-600 text-sm font-medium" id="tbody">
                <?php if(count($trainings)): ?>
                        <?php $__currentLoopData = $trainings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $training): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="bg-white my-3 text-center">
                                <td class="py-4 my-2">
                                    <?php echo e($training->name); ?>

                                </td>
                                <td>
                                    <?php echo e(Auth::user()->first_name.' '.Auth::user()->last_name); ?>

                                </td>
                                <td>
                                    <?php if(strtotime($training->start_date." ".$training->start_time) >= strtotime(date('Y-m-d h:i:s')) && strtotime($training->end_date." ".$training->end_time) >= strtotime(date('Y-m-d h:i:s'))): ?>
                                        <span class="text-white bg-green-300 rounded-full py-2 px-4">Ongoing</span>
                                    <?php elseif(strtotime($training->start_date." ".$training->start_time) >= strtotime(date('Y-m-d h:i:s')) && strtotime($training->end_date." ".$training->end_time) < strtotime(date('Y-m-d h:i:s'))): ?>
                                        <span class="text-white bg-red-300 rounded-full py-2 px-4">Ended</span>
                                    <?php else: ?>
                                        <span class="text-white bg-yellow-300 rounded-full py-2 px-4">Not Started</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="relative">
                                        <a href="#" class="relative z-2 block rounded-md bg-white p-2 focus:outline-none" onclick="showHideMenu('op<?php echo e($training->id); ?>')">
                                            <svg width="20" height="4" viewBox="0 0 20 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.81086 3.73333C1.60952 3.73333 0.63564 2.8976 0.63564 1.86667C0.63564 0.835735 1.60952 0 2.81086 0C4.0122 0 4.98608 0.835735 4.98608 1.86667C4.98608 2.8976 4.0122 3.73333 2.81086 3.73333Z" fill="#858585"/>
                                                <path d="M9.95808 3.73333C8.75674 3.73333 7.78286 2.8976 7.78286 1.86667C7.78286 0.835735 8.75674 0 9.95808 0C11.1594 0 12.1333 0.835735 12.1333 1.86667C12.1333 2.8976 11.1594 3.73333 9.95808 3.73333Z" fill="#858585"/>
                                                <path d="M17.1053 3.73333C15.904 3.73333 14.9301 2.8976 14.9301 1.86667C14.9301 0.835735 15.904 0 17.1053 0C18.3066 0 19.2805 0.835735 19.2805 1.86667C19.2805 2.8976 18.3066 3.73333 17.1053 3.73333Z" fill="#858585"/>
                                            </svg>
                                        </a>

                                        <div class="absolute right-0 mt-2 ml-10 w-32 bg-white rounded-md shadow-xl z-20 hidden" id="op<?php echo e($training->id); ?>">
                                            <a href="<?php echo e(route('admin.training.details', ['id'=>$training->id])); ?>" class="block px-2 py-3 rounded text-sm capitalize text-gray-700 bg-gradient-to-r hover:from-purple-400 hover:via-pink-500 hover:to-red-500 hover: hover:text-white">
                                                Edit Training
                                            </a>
                                            <a href="<?php echo e(route('admin.training.remove', ['id'=>$training->id])); ?>" class="block px-2 py-3 rounded text-sm capitalize text-gray-700 bg-gradient-to-r hover:from-purple-400 hover:via-pink-500 hover:to-red-500 hover: hover:text-white">
                                                Delete Training
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr class="bg-white my-3 text-center">
                            <td colspan="4" class="text-center py-4 my-2">
                                There are no registered trainings at the moment.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Modal HTML embedded directly into document -->
    <div id="trainingModal" class="modal" style="width: 75%; max-width: 75%; padding: 3% 10%">
        <form class="text-center" method="POST" action="<?php echo e(route('admin.training.new')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            
            <div class="py-2 text-left">
                <label for="event_name" class="uppercase block text-xs mb-2">Training Title</label>
                <input type="text" class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Training title " name="title" required/>
            </div>

            <div class="py-2 text-left">
                <label for="event_name" class="uppercase block text-xs mb-2">Training Description</label>
                <textarea cols="30" rows="4" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-8 rounded-lg focus:border-gray-700" placeholder="Training Description" name="description" required></textarea>
            </div>

            <div class="py-2 text-left">
                <label for="event_name" class="uppercase block text-xs mb-2">Training Banner (png, jpg, webp)</label>
                <input type="file" class="border text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700" accept="image/*" name="banner" placeholder="Upload Image" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
                <div class="py-2 text-left">
                    <label for="event_name" class="uppercase block text-xs mb-2">Start Date</label>
                    <input type="date" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="State Date" name="start_date" required/>
                </div>

                <div class="py-2 text-left">
                    <label for="event_name" class="uppercase block text-xs mb-2">Start Time</label>
                    <input type="time" class="border text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Start Time" name="start_time" required/>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
                <div class="py-2 text-left">
                    <label for="event_name" class="uppercase block text-xs mb-2">End Date</label>
                    <input type="date" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="End date" name="end_date" required/>
                </div>

                <div class="py-2 text-left">
                    <label for="event_name" class="uppercase block text-xs mb-2">End Time</label>
                    <input type="time" class="border text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700" placeholder="End Time" name="end_time" required/>
                </div>
            </div>

            <div class="py-2 mt-6">
                <button type="submit" class="border-2 text-sm border-gray-100 focus:outline-none bg-indigo-800 text-white font-medium uppercase tracking-wider block w-3/4 md:w-1/2  m-auto py-4 rounded-lg focus:border-gray-700 hover:bg-purple-700">
                    Create Training
                </button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        document.getElementById('training').classList.add('active');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iamnotalone/public_html/iamnotalone/resources/views/admin/training.blade.php ENDPATH**/ ?>