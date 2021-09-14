<?php $__env->startSection('content'); ?>

    <div class="w-5/6 justify-items-center my-8 mx-auto">
        <input type="text" name="" id="" class="block mx-auto border-2 text-center text-sm border-gray-100 focus:outline-none block w-full p-3 rounded-lg focus:border-gray-700" placeholder="Search by Activity Name, Activity Type, Activity Organizer, Location, Status">
    </div>

    <div class="overflow-x-auto">
        <div class="min-w-screen mt-12 flex items-center justify-center font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <div class=" shadow-md rounded">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-center">First Name</th>
                                <th class="py-3 px-6 text-center">Last Name</th>
                                <th class="py-3 px-6 text-center">Email</th>
                                <th class="py-3 px-6 text-center">Location</th>
                                <th class="py-3 px-6 text-center">Type</th>
                            </tr>
                        </thead>
                        
                        <tbody class="text-gray-600 text-sm font-medium">
                            <?php if(count($users)): ?>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="bg-white my-3 text-center">
                                        <td class="pl-4 py-4 my-2 whitespace-nowrap">
                                            <span class="font-medium"><?php echo e($user->first_name); ?></span>
                                        </td>
                                        <td class="text-center py-4 my-2">
                                            <span><?php echo e($user->last_name); ?></span>
                                        </td>
                                        <td class="text-center py-4 my-2">
                                            <?php echo e($user->email); ?>

                                        </td>
                                        <td class="text-center py-4 my-2">
                                            <?php echo e($user->state); ?>

                                        </td>
                                        <td class="text-center py-4 my-2 pr-2">
                                            <?php if($user->organizer): ?>
                                                Organizer
                                            <?php else: ?>
                                                User
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr class="bg-white my-3 text-center">
                                    <td colspan="5" class="text-center py-4 my-2">
                                        There are no registered users on this platform at the moment.
                                    </td>
                                </tr>
                            <?php endif; ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        document.getElementById('users').classList.add('active');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iamnotalone/public_html/iamnotalone/resources/views/admin/users.blade.php ENDPATH**/ ?>