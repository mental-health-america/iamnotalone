<a href="#topicModal" rel="modal:open" class="border-2 text-sm border-gray-100 focus:outline-none bg-blue-900 text-white font-medium uppercase text-center block w-full  m-auto py-4 rounded-lg focus:border-gray-700 hover:bg-blue-800">
    <span class="uil uil-plus"></span>
    Start a New Topic
</a>
<div class="rounded rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out mt-8">
    <div class="flex flex-row p-4">
        <div class="w-3/4">
            <p class="font-light font-light uppercase text-sm">Topic by events</p>
            <?php $__currentLoopData = $sideEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p class="font-semibold text-sm my-6">
                    <a href="<?php echo e(route('forum.event.topics', ['id'=>$event->id])); ?>"><?php echo e($event->name); ?></a>
                </p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="1/4 text-center">
            <p class="font-light font-light uppercase text-sm">Post</p>
             <?php $__currentLoopData = $sideEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p class="font-semibold text-sm my-6">
                    <a href="<?php echo e(route('forum.event.topics', ['id'=>$event->id])); ?>"><?php echo e($event->posts->count()); ?></a>
                </p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<div class="rounded rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out mt-16">
    <div class="flex flex-row p-4">
        <div class="w-3/4">
            <p class="font-light font-light uppercase text-sm">Popular Topics</p>
            <?php $__currentLoopData = $ncp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p class="font-semibold text-sm my-6">
                    <a href="<?php echo e(route('forum.topics.popular', ['id'=>$post->id])); ?>"><?php echo e($post->title); ?></a>
                </p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="1/4 text-center">
            <p class="font-light font-light uppercase text-sm">Comments</p>
            <p class="font-semibold text-sm my-6">
                <?php $__currentLoopData = $ncp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('forum.topics.popular', ['id'=>$post->id])); ?>"><?php echo e($post->postComments); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </p>
        </div>
    </div>
</div><?php /**PATH /home/iamnotalone/public_html/iamnotalone/resources/views/partials/forum_right_bar.blade.php ENDPATH**/ ?>