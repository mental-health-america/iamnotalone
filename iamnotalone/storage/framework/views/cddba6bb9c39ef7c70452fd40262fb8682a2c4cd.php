<?php $__env->startSection('content'); ?>

    <div class="px-4 mt-8">
        <!--<span class="text-xl font-semibold capitalize">
            <?php echo e($training->name); ?> Training
        </span>-->
        <a href="#trainingModal" rel="modal:open" class=" md:w-1/4 float-right border-2 text-sm border-gray-100 focus:outline-none bg-blue-900 text-white font-medium uppercase text-center block w-full  m-auto py-4 rounded-lg focus:border-gray-700 hover:bg-blue-800">
            <span class="uil uil-plus"></span>
            Update <?php echo e($training->name); ?>

        </a>

         <a href="#seriesModal" rel="modal:open" class=" md:w-1/4 float-right border-2 text-sm border-gray-100 focus:outline-none bg-blue-900 text-white font-medium uppercase text-center block w-full  m-auto py-4 rounded-lg focus:border-gray-700 hover:bg-blue-800">
            <span class="uil uil-plus"></span>
            Add New Episode
        </a>
    </div>
    
    <div class="mt-8 w-full">
        <table class="min-w-max w-full table-auto" id="table">
            <thead>
                <tr class="text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-6 px-6 text-center resize-x">Episode Title</th>
                    <th class="py-6 px-6 text-center resize-x">Material</th>
                    <th class="py-6 px-6 text-center resize-x">Youtube Url</th>
                    <th class="py-6 px-6 text-center resize-x"></th>
                </tr>
            </thead>

            <tbody class="text-gray-600 text-sm font-medium" id="tbody">
                <?php if(count($episodes)): ?>
                        <?php $__currentLoopData = $episodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $episode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $materials = $episode->materials;   
                            ?>
                            <tr class="bg-white my-3 text-center">
                                <td class="py-4 my-2">
                                    <?php echo e($episode->title); ?>

                                </td>
                                <td class="py-4 my-2">
                                    <?php if(count($materials)): ?>
                                        <?php
                                            $x = 1;
                                        ?>
                                        <ul>
                                            <?php $__currentLoopData = $materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <a href="/<?php echo e($material->material); ?>" target="_blank" rel="noopener noreferrer">Download material <?php echo e($x); ?></a>    
                                                </li>
                                                <?php
                                                    $x++;
                                                ?>                                                
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php else: ?>
                                        No material
                                    <?php endif; ?>
                                    
                                </td>
                                <td class="py-4 my-2">
                                    <a href="<?php echo e($episode->url); ?>" target="_blank" rel="noopener noreferrer">Watch</a>
                                </td>
                                <td class="py-4 my-2">
                                    <div class="relative">
                                        <a href="#" class="relative z-2 block rounded-md bg-white p-2 focus:outline-none" id="actionDot" onclick="showHideMenu('op<?php echo e($episode->id); ?>')">
                                            <svg width="20" height="4" viewBox="0 0 20 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.81086 3.73333C1.60952 3.73333 0.63564 2.8976 0.63564 1.86667C0.63564 0.835735 1.60952 0 2.81086 0C4.0122 0 4.98608 0.835735 4.98608 1.86667C4.98608 2.8976 4.0122 3.73333 2.81086 3.73333Z" fill="#858585"/>
                                                <path d="M9.95808 3.73333C8.75674 3.73333 7.78286 2.8976 7.78286 1.86667C7.78286 0.835735 8.75674 0 9.95808 0C11.1594 0 12.1333 0.835735 12.1333 1.86667C12.1333 2.8976 11.1594 3.73333 9.95808 3.73333Z" fill="#858585"/>
                                                <path d="M17.1053 3.73333C15.904 3.73333 14.9301 2.8976 14.9301 1.86667C14.9301 0.835735 15.904 0 17.1053 0C18.3066 0 19.2805 0.835735 19.2805 1.86667C19.2805 2.8976 18.3066 3.73333 17.1053 3.73333Z" fill="#858585"/>
                                            </svg>
                                        </a>

                                        <div class="deleteEpisodeContainer absolute right-0 mt-2 ml-10 w-32 bg-white rounded-md shadow-xl z-20 hidden" id="op<?php echo e($episode->id); ?>">
                                            <a href="#editEpisodeModal" data-title="<?php echo e($episode->title); ?>" data-description="<?php echo e($episode->description); ?>" data-episodeUrl="<?php echo e($episode->url); ?>" data- data-url="<?php echo e(route('admin.training.episode.update', ['id'=>$episode->id])); ?>" data-id="<?php echo e($episode->id); ?>" rel="modal:open" class="editEpisode block px-2 py-3 rounded text-sm capitalize text-gray-700 bg-gradient-to-r hover:from-purple-400 hover:via-pink-500 hover:to-red-500 hover: hover:text-white" title="Edit Episode">
                                            Edit Episode
                                            </a>
                                            <a href="#deleteEpisodeModal" data-title="<?php echo e($episode->title); ?>" data-url="<?php echo e(route('admin.training.episode.remove', ['id'=>$episode->id])); ?>" data-id="<?php echo e($episode->id); ?>" rel="modal:open" class="deleteEpisode block px-2 py-3 rounded text-sm capitalize text-gray-700 bg-gradient-to-r hover:from-purple-400 hover:via-pink-500 hover:to-red-500 hover: hover:text-white" title="Delete Episode">
                                                Delete Episode
                                            </a>
                                            



                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr class="bg-white my-3 text-center">
                            <td colspan="4" class="text-center py-4 my-2">
                                No episodes have been added to this training yet.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Delete Warning Modal -->
    <div id="deleteEpisodeModal" class="modal" style="width: 40%; max-width: 40%;">
    <!-- <span onclick="document.getElementById('deleteEpisodeModal').style.display='none'" class="close" title="Close Modal">&times;</span> -->
        <div id="loader"></div>
        <form action="" method="get" id="deleteForm">
            <div class="modal-content">
                <div class="container">
                    <h1>Delete</h1>
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <h5 class="text-center delteModalText"></h5>
                    </div>
                    <div class="clearfix">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="deleteConfirmed" data-attr="" class="btn btn-danger">Yes, Delete</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Modal  Edit Episode HTML embedded directly into document -->
    <div id="editEpisodeModal" class="modal" style="width: 75%; max-width: 75%; padding: 5% 10%">
        <form class="text-center" id="editEpisodeForm" method="POST" action="" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="py-2 text-left">
                <label for="event_name" class="uppercase block text-xs mb-2">Episode Title</label>
                <input type="text" class="edit_title bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Episode title" name="title" value="" required/>
            </div>

            <div class="py-2 text-left">
                <label for="event_name" class="uppercase block text-xs mb-2">Episode URL</label>
                <input type="url" class="edit_url bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Episode URL" name="url" value="" required/>
            </div>
            <div class="edit_on_file_description">
                <div class="file_description">
                    <div class="py-2 text-left">
                        <label for="event_name" class="uppercase block text-xs mb-2">Episode Material (PDF ONLY)<span style="padding-left:4px"><a href="#" data-toggle="tooltip" data-placement="auto right" title="Uploading new files will replace your earlier uploaded files for the episodes!" style="display: inline-block;"><img class="object-cover h-auto md:h-96 w-full rounded-xl" alt="information icon" style="height: 21px;width: 21px;" src="<?php echo e(asset('images/information.png')); ?>"></a></span></label>
                        <input type="file" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Material" name="material[]" accept="application/pdf"/>
                    </div>
                    <div class="py-2 text-left">
                        <label for="event_name" class="uppercase block text-xs mb-2">Episode Description</label>
                        <input type="text" class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Episode Description" name="episode_description[]" maxlength="255" required style="display:inline-block; width: 93%"/>
                        <span class="add_more_files" data-event="edit" style="display:inline-block;"><a href="#"><img src="<?php echo e(asset('images/plus.png')); ?>" alt="information icon" style="height: 21px;width: 21px;" /></a></span>
                    </div>
                    
                </div>
            </div>
            
            <input type="hidden" name="training" value="<?php echo e($training->id); ?>">

            <div class="py-2 mt-6">
                <button type="submit" class="border-2 text-sm border-gray-100 focus:outline-none bg-indigo-800 text-white font-medium uppercase tracking-wider block w-3/4 md:w-1/2  m-auto py-4 rounded-lg focus:border-gray-700 hover:bg-purple-700">
                    Update Episode
                </button>
            </div>
        </form>
    </div>

    <!-- Modal HTML embedded directly into document -->
    <div id="seriesModal" class="modal" style="width: 75%; max-width: 75%; padding: 5% 10%; overflow-y:auto; height: 750px">
        <form class="text-center" method="POST" action="<?php echo e(route('admin.training.episode.new')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="py-2 text-left">
                <label for="event_name" class="uppercase block text-xs mb-2">Episode Title</label>
                <input type="text" class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Episode title" name="title" required/>
            </div>

            <div class="py-2 text-left">
                <label for="event_name" class="uppercase block text-xs mb-2">Episode URL</label>
                <input type="url" class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Episode URL" name="url" required/>
            </div>

            <div class="add_on_file_description">
                <div class="file_description">
                    <div class="py-2 text-left">
                        <label for="event_name" class="uppercase block text-xs mb-2">Episode Material (PDF ONLY)</label>
                        <input type="file" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Material" name="material[]" accept="application/pdf"/>
                    </div>
                    <div class="py-2 text-left">
                        <label for="event_name" class="uppercase block text-xs mb-2">Episode Description</label>
                        <input type="text" class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Episode Description" name="episode_description[]" style="display:inline-block; width:93%;" maxlength="255" required/>
                        <span class="add_more_files" data-event="add" style="display:inline-block;"><a href="#"><img src="<?php echo e(asset('images/plus.png')); ?>" alt="information icon" style="height: 21px;width: 21px;" /></a></span>
                    </div>
                    
                </div>
            </div>
            <input type="hidden" name="training" value="<?php echo e($training->id); ?>">

            <div class="py-2 mt-6">
                <button type="submit" class="border-2 text-sm border-gray-100 focus:outline-none bg-indigo-800 text-white font-medium uppercase tracking-wider block w-3/4 md:w-1/2  m-auto py-4 rounded-lg focus:border-gray-700 hover:bg-purple-700">
                    Add Episode
                </button>
            </div>
        </form>
    </div>

    <!-- Modal HTML embedded directly into document -->
    <div id="trainingModal" class="modal" style="width: 75%; max-width: 75%; padding: 5% 10%">
        <form class="text-center" method="POST" action="<?php echo e(route('admin.training.update')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            
            <div class="py-2 text-left">
                <label for="event_name" class="uppercase block text-xs mb-2">Training Title</label>
                <input type="text" class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Training title " name="title" value="<?php echo e($training->name); ?>" required/>
            </div>

            <div class="py-2 text-left">
                <label for="event_name" class="uppercase block text-xs mb-2">Training Description</label>
                <textarea cols="30" rows="4" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-8 rounded-lg focus:border-gray-700" placeholder="Training Description" name="description" required><?php echo e($training->description); ?></textarea>
            </div>

            <div class="py-2 text-left">
                <label for="event_name" class="uppercase block text-xs mb-2">Banner</label>
                <input type="file" class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Thumbnail" name="banner" accept="image/*"/>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
                <div class="py-2 text-left">
                    <label for="event_name" class="uppercase block text-xs mb-2">Start Date</label>
                    <input type="date" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="State Date" name="start_date" value="<?php echo e($training->start_date); ?>" required/>
                </div>

                <div class="py-2 text-left">
                    <label for="event_name" class="uppercase block text-xs mb-2">Start Time</label>
                    <input type="time" class="border text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Start Time" name="start_time" value="<?php echo e($training->start_time); ?>" required/>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
                <div class="py-2 text-left">
                    <label for="event_name" class="uppercase block text-xs mb-2">End Date</label>
                    <input type="date" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="End date" name="end_date" value="<?php echo e($training->end_date); ?>" required/>
                </div>

                <div class="py-2 text-left">
                    <label for="event_name" class="uppercase block text-xs mb-2">End Time</label>
                    <input type="time" class="border text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700" placeholder="End Time" name="end_time" value="<?php echo e($training->end_time); ?>" required/>
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo e($training->id); ?>">
            <div class="py-2 mt-6">
                <button type="submit" class="border-2 text-sm border-gray-100 focus:outline-none bg-indigo-800 text-white font-medium uppercase tracking-wider block w-3/4 md:w-1/2  m-auto py-4 rounded-lg focus:border-gray-700 hover:bg-purple-700">
                    Update Training
                </button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        $(document).on('click', ".add_more_files", function(e) {
            var data = $(this).attr('data-event');
            localStorage.setItem("data",data);
            var local_storer = localStorage.getItem("data");
            var html = '<div class="file_description"> <div class="py-2 text-left"> <label for="event_name" class="uppercase block text-xs mb-2">Episode Material</label> <input type="file" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Material" name="material[]" accept="application/pdf"/> </div> <div class="py-2 text-left" style="display:inline-block; width:85%"> <label for="event_name" class="uppercase block text-xs mb-2">Episode Description</label> <input type="text" class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Episode Description" name="episode_description[]" maxlength="255" required/> </div> <span class="add_more_files" data-event='+ local_storer +' style="display:inline-block; width: 6%"><a href="#"><img src="<?php echo e(asset('images/plus.png')); ?>" alt="information icon" style="height: 21px;width: 21px;" /></a></span> <span class="remove_files" style="display:inline-block; width: 6%"><a href="#"><img src="<?php echo e(asset('images/red-minus.png')); ?>" alt="information icon" style="height: 20px;width: 29px;" /></a></span> </div>';
            data == 'add' ? $(html).insertAfter(".add_on_file_description .file_description:last") : $(html).insertAfter(".edit_on_file_description .file_description:last");
            localStorage.removeItem("data");

            
        })
        $(document).on("click", ".remove_files", function(e) {
            $(this).closest('.file_description').remove();
        });
        document.getElementById('training').classList.add('active');
        $(document).click(function (e) {
            if (!$(e.target).is('#actionDot')) {
                $('.deleteEpisode').css(" ", "none");
                $('.deleteEpisodeContainer').css("display", "none");
            }
        });  
        $(".editEpisode").on('click',function(){
            var episodeID = $(this).attr('data-id');
            var episodeURL = $(this).attr('data-episodeUrl');
            var episodeDescription = $(this).attr('data-description');
            var episodeTitle = $(this).attr('data-title');
            var editUrl = $(this).attr('data-url');
            $(".edit_title").val(episodeTitle);
            $(".edit_url").val(episodeURL);
            $(".edit_description").val(episodeDescription);
            $("#editEpisodeForm").attr('action', editUrl);
        });     
        $(".deleteEpisode").on('click',function(){
            var episodeID = $(this).attr('data-id');
            showHideMenu('op'+episodeID);
            var episodeTitle = $(this).attr('data-title');
            var deleteUrl = $(this).attr('data-url');
            var deleteText = 'Are you sure you want to delete '+ episodeTitle
            $(".delteModalText").text(deleteText);
            $("#deleteConfirmed").attr('data-attr', deleteUrl);
            $("#deleteForm").attr('action', deleteUrl);
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iamnotalone/public_html/iamnotalone/resources/views/admin/training_details.blade.php ENDPATH**/ ?>