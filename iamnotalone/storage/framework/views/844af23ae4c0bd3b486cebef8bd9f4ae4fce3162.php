<?php $__env->startSection('content'); ?>
    <section class="flex flex-col mb-10 min-h-1/2">
        <div class="flex flex-1 items-center justify-center">
            <div class="px-4 sm-px-0 lg:w-3/5 sm:w-4/5 w-full sm:m-auto text-gray-600">
                <div class="mb-6">
                    <h1 class="font-medium uppercase tracking-wider text-3xl mb-10 w-full text-center text-black">
                        Create your Event
                    </h1>
                    <h6 class="uppercase text-sm font-semibold mb-2">Location</h6>
                    <p class="text-sm">Make your event easily discoverable and help your attendees know where to show up.</p>
                </div>

                <div class="flex flex-col sm:flex-row mb-6 justify-items-center">
                    <a href="<?php echo e(route('event.inperson')); ?>" class="capitalize text-center border border-indigo-600 focus:outline-none bg-gray-100 text-black font-medium tracking-wider w-3/4 sm:w-1/3 m-auto mb-4 block py-3 rounded-lg focus:border-gray-700 hover:bg-purple-700 hover:text-white">
                        In-Person
                    </a>

                    <a href="<?php echo e(route('event.online')); ?>" class="capitalize text-center border-2 sm:mx-4 border-indigo-400 focus:outline-none bg-primary text-white font-medium tracking-wider block w-3/4 sm:w-1/3 m-auto mb-4 py-3 rounded-lg focus:border-gray-700 hover:bg-purple-700">
                        Online
                    </a>

                    <a href="<?php echo e(route('event.hybrid')); ?>" class="capitalize text-center border border-indigo-600 focus:outline-none bg-gray-100 text-black font-medium tracking-wider block w-3/4 sm:w-1/3 m-auto mb-4 py-3 rounded-lg focus:border-gray-700 hover:bg-purple-700 hover:text-white">
                        Hybrid
                    </a>
                </div>
                <form class="" method="POST" action="<?php echo e(route('event.update.online')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="">
                        <div class="control-group">
                            <label class="radio" for="link_reg">
                                <input type="radio" name="radio_link" id="link_reg" value="registration_link" style="margin: 0 5px 0 10px;">Registration Link
                            </label>
                            <label class="radio" for="link_event">
                                <input type="radio" name="radio_link" id="link_event" value="event_link" style="margin: 0 5px 0 10px;">Event Link
                            </label>
                            <div class="py-2 text-left registration_link">
                                <label for="registration_link" class="uppercase block text-xs mb-2">Registration Link</label>
                                <input type="text" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 registration_link" placeholder="Registration link" id="registration_link" name="registration_link"/>
                            </div>
                            <div class="py-2 text-left event_link">
                                <label for="event_link" class="uppercase block text-xs mb-2">Event Link</label>
                                <input type="text" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 event_link" placeholder="Event link" id="event_link" name="link"/>
                            </div>
                        </div>
                        <!--<div class="py-2 text-left">
                            <label for="platform" class="uppercase block text-xs mb-2">Platform</label>
                            <input type="text" list="platforms" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Platform" id="platform" name="platform" required/>
                            <datalist id="platforms">
                                <option value="Zoom">Zoom</option>
                                <option value="Google Meet">Google Meet</option>
                                <option value="Ring Central">Ring Central</option>
                                <option value="Microsoft Teams">Microsoft Teams</option>
                            </datalist>
                        </div>-->
                        
                        <div class="py-2 mt-6">
                            <button class="uppercase text-center border border-gray-100 focus:outline-none bg-primary text-white font-semibold tracking-wider block w-3/4 md:w-1/2 m-auto py-3 rounded-lg focus:border-gray-700 hover:bg-purple-700">
                                Next
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        document.getElementById("events").classList.add('link-active');
        $(function (){
            $(".event_link").hide();
            $(".registration_link").hide();
            $("#registration_link").attr("disabled", "disabled");
            $("#event_link").attr("disabled", "disabled");
            $("#link_event, #link_reg").click(function (){
                var value = $(this).val();
                $(".event_link").hide();
                $(".registration_link").hide();
                $("#registration_link").attr("disabled", "disabled");
                $("#event_link").attr("disabled", "disabled");
                $(this).closest(".control-group").find("input[type=url]")

                // ...then find the text field whose class name matches
                // the value of this radio button ("dollars" or "percent")...
                .end().find("." + value).show()

                // ...and enable that text field
                .removeAttr("disabled")     
                .end();
            });
            });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iamnotalone/public_html/iamnotalone/resources/views/online_event.blade.php ENDPATH**/ ?>