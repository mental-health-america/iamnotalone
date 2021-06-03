<?php $__env->startSection('content'); ?>
    <div class="text-center mb-8">
        <h1 class="text-2xl text-gray-400">
            <?php echo e($event->name); ?>

        </h1>
    </div>
    <?php if(count($episodes)): ?>
        <div class="w-full p-4 sm:p-0 sm:w-5/6 md:w-4/6 sm:mx-auto">
            <h1 class="text-2xl text-gray-800 p-4 bg-green-100"><?php echo e($event->name.' : '.$currentEpisode->title); ?></h1>
            <iframe
                class="w-full h-80"
                src="<?php echo e($currentEpisode->url); ?>"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowFullScree>
            </iframe>

            <?php
                $materials = $currentEpisode->materials;
            ?>

            <div class="my-4">
                <?php if(count($materials)): ?>
                    <?php
                        $x = 1;
                    ?>
                    <?php $__currentLoopData = $materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="my-1">
                            <a href="/<?php echo e($material->material); ?>" target="_blank">Download Episode Material <?php echo e($x); ?></a>
                        </p>
                        <?php
                            ++$x;
                        ?>  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <p class="my-2">No material available for download.</p>
                <?php endif; ?>
            </div>

            <?php $__currentLoopData = $episodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $episode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($episode->id !== $currentEpisode->id): ?>
                    <a href="<?php echo e(route('event.training.start',['id'=>$event->id, 'eId'=>$episode->id])); ?>">
                        <h1 class="text-lg mb-1 text-gray-800 p-4 bg-green-100"><?php echo e($event->name.' : '.$episode->title); ?></h1>
                    </a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <p class="text-center text-gray-600 text-lg">Materials for the training have not been uploaded.</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        document.getElementById("events").classList.add('link-active');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iamnotalone/public_html/iamnotalone/resources/views/training.blade.php ENDPATH**/ ?>