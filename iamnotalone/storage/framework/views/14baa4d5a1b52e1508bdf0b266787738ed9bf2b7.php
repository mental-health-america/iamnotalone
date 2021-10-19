<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="flex flex-col md:flex-row text-gray-600">
        <div class="w-full md:w-1/6 mb-8">
            <?php echo $__env->make('partials.forum_left_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="w-full md:w-3/6 flex flex-col px-4 md:px-12">
            <div class="flex flex-wrap items-stretch border-2 border-gray-100 w-full relative h-15 bg-white rounded-lg items-center mb-4">
                <div class="flex -mr-px">
                    <span class="flex items-center leading-normal bg-white rounded rounded-l-none border-0 px-3 whitespace-no-wrap text-gray-600">
                        <i onclick="showHidePassword('password', 'passIcon')" id="passIcon" class="uil uil-search"></i>
                    </span>
                </div>
                <input type="text" id="search" class="flex-shrink p-4 font-semibold focus:outline-none flex-grow flex-auto text-sm w-px flex-1 relative self-center focus:border-gray-700" placeholder="Search for Topics" name="password" required/>
            </div>
            
            <div class="w-full mt-8 sm:p-12 p-6 overflow-hidden rounded-lg border-2 shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
                <h3 class="mb-4"><?php echo e($post->title); ?></h3>
                <p class="pb-8 border-b border-gray-400 font-light text-gray-600 text-justify">
                    <?php echo e($post->body); ?>

                </p>
                <div class="flex flex-col sm:flex-row text-xs font-semibold mt-4 mb-8">
                    <p class="sm:w-2/3">
                        Posted by 
                        <span class="text-indigo-800"><?php echo e($post->user->first_name.' '.$post->user->last_name); ?></span>
                    </p>
                    <p class="sm:w-1/3 mt-2">
                        <?php echo e($comments->count()); ?> Comments
                        <span class="text-right text-indigo-800">
                            <a href="#" class="">Report</a>
                        </span>
                    </p>
                </div>

                <div class="">
                    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="mb-4 font-light text-gray-600 text-justify">
                            <?php echo e($comment->comment); ?>

                        </p>
                        <div class="flex flex-col sm:flex-row text-xs font-semibold mb-8">
                            <p class="sm:w-2/3">
                                Commented by 
                                <span class="text-indigo-800"><?php echo e($comment->user->first_name.' '.$comment->user->last_name); ?></span>
                            </p>
                            <p class="sm:w-1/3 mt-2">
                                <span class="text-right text-indigo-800">
                                    <a href="#" class="">Report</a>
                                </span>
                                <span class="text-right text-indigo-800 px-1">
                                    <a href="#" class=""><?php echo e(date('m-d-Y H:i:s', strtotime($comment->created_at))); ?></a>
                                </span>
                            </p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    <form class="text-center" method="POST" action="<?php echo e(route('forum.comment.new')); ?>">
                        <?php echo csrf_field(); ?>                        
                        <div class="py-2 text-left">
                            <label for="post" class="uppercase block text-xs mb-2">Enter Topic Content</label>
                            <textarea cols="30" rows="4" id="post" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-8 rounded-lg focus:border-gray-700" placeholder="Type something..." name="comment" required></textarea>
                        </div>
                        <input type="hidden" name="post" value="<?php echo e($post->id); ?>">
                        <div class="mt-6">
                            <button type="submit" class="border-2 mx-auto uppercase text-sm border-indigo-600 focus:outline-none bg-indigo-800 text-white font-medium uppercase inline-block w-5/6 sm:1/2 md:w-1/2 py-4 rounded-lg focus:border-gray-700 hover:bg-white hover:text-gray-800">
                                Post Comment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="md:w-2/6 px-4 mt-8 md:mt-0">
            <?php echo $__env->make('partials.forum_right_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <!-- Modal HTML embedded directly into document -->
    <div id="topicModal" class="modal" style="width: 75%; max-width: 75%; padding: 5% 10%">
       <form class="text-center" method="POST" action="<?php echo e(route('forum.new')); ?>">
            <?php echo csrf_field(); ?>
            <h4 class="font-medium uppercase tracking-wider text-lg mb-10 w-full">
                Open a topic to start a conversation on with other event participants.
            </h4>
            <div class="py-2 text-left">
                 <label for="title" class="uppercase block text-xs mb-2">Topic Title</label>
                <input type="text" id="title" class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Enter title for your topic" name="title" autofocus required />
            </div>

            <div class="py-2 text-left">
                 <label for="event" class="uppercase block text-xs mb-2 capitalize">Select Related Event Topic</label>
                 <select name="event" id="event" class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700" required>
                    <option value="">Select an Event your topic is related to</option>
                    <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($event->id); ?>"><?php echo e($event->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>
            </div>
            
            <div class="py-2 text-left">
                <label for="post" class="uppercase block text-xs mb-2">Enter Topic Content</label>
                <textarea cols="30" rows="4" id="post" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-8 rounded-lg focus:border-gray-700" placeholder="Enter details of your topic" name="post" required></textarea>
            </div>
            
            <div class="py-2 mt-6 flex flex-row">
                <div class="w-1/2 pr-2 md:pr-4">
                    <button type="submit" class="border-2 mx-auto sm:float-right uppercase text-sm border-indigo-600 focus:outline-none bg-indigo-800 text-white font-medium uppercase inline-block w-5/6 sm:2/3 md:4/6 py-4 rounded-lg focus:border-gray-700 hover:bg-white hover:text-gray-800">
                        Post
                    </button>
                </div>
                <div class="w-1/2 pr-2 md:pl-4">
                    <a href="#close-modal" rel="modal:close" class="border-2 mx-auto sm:float-left uppercase text-sm border-indigo-600 focus:outline-none bg-white text-gray-800 font-medium uppercase  inline-block w-5/6 sm:2/3 md:4/6 py-4 rounded-lg focus:border-gray-700 hover:bg-indigo-800 hover:text-white">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        document.getElementById("forums").classList.add('link-active');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iamnotalone/public_html/iamnotalone/resources/views/post.blade.php ENDPATH**/ ?>