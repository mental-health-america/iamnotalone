<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/multiselect.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="flex flex-col mb-10">
        <div class="flex flex-1 items-center justify-center">
            <div class="px-4 sm-px-0 lg:w-3/5 sm:w-4/5 w-full sm:m-auto w-full text-gray-600">
                <form class="" method="POST" action="<?php echo e(route('event.create')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="mb-6">
                        <h1 class="font-medium uppercase tracking-wider text-3xl mb-10 w-full text-center text-black">
                            Create your Event
                        </h1>
                        <p class="text-sm sm:text-center">Name your event and tell event-goers why they should come. Add details that highlight what makes it unique.</p>
                    </div>

                    <div class="">
                        <div class="py-2 text-left">
                            <label for="event_name" class="uppercase block text-xs mb-2">Event Name</label>
                            <input type="text" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Event name" name="name" required value="<?php echo e(old('name')); ?>"/>
                        </div>

                        <div class="py-2 text-left">
                            <label for="organizer" class="uppercase block text-xs mb-2">Organizer</label>
                            <input type="text" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="MO AMAMA" value="<?php echo e(Auth::user()->first_name.' '.Auth::user()->last_name); ?>" readonly/>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-6">
                            <div class="py-2 text-left">
                                <label for="event_name" class="uppercase block text-xs mb-2">Category</label>
                                <select name="category" id="category" required class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700">
                                    <option value="">Select Event Category</label>
                                    <option value="Community">Support group</label>
                                    <option value="Conference">Conference</label>
                                    <option value="Training">Training</label>
                                    <option value="Concert">Concert</label>
                                    <option value="Activities">Activity</label>
                                </select>
                            </div>

                            <div class="py-2 text-left">
                                <label for="event_name" class="uppercase block text-xs mb-2">Event Banner (PNG, JPG; 750 * 250 px)</label>
                                <input type="file" class="border text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700" required accept="image/*" name="banner" placeholder="Upload Image" value="<?php echo e(old('banner')); ?>"/>
                            </div>
                        </div>

                        <div class="py-2 text-left">
                            <label for="event_name" class="uppercase block text-xs mb-2">Description</label>
                            <textarea cols="30" rows="3" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-8 rounded-lg focus:border-gray-700" placeholder="Description" name="description" required><?php echo e(old('description')); ?></textarea>
                        </div>

                        <div class="relative mt-2">
                            <input type="checkbox" name="peers" id="peers" value="1" class="inline-block align-middle" />
                            <label class="inline-block align-middle text-xs uppercase" for="accomodation">Click here if this event is for Peers only</label>
                        </div>

                        <div class="relative mt-2">
                            <input type="checkbox" name="accomodation" id="accomodation" value="1" class="inline-block align-middle" />
                            <label class="inline align-middle text-xs uppercase" for="accomodation">CLICK HERE IF YOU ARE OFFERING ANY DISABILITY ACCOMMODATIONS</label>
                        </div>

                        <div class="py-4 hidden text-left" id="adiv" style="display: none">
                            <label class="uppercase block text-xs mb-2">Type of Accomodation(You can select multiple options)</label> 
                            <div class="pl-6">
                                <label class="block align-middle text-xs uppercase"><input type="checkbox" name="accomodation[]" value="ASL Interpreter"> ASL Interpreter</label>
                                <label class="block align-middle text-xs uppercase"><input type="checkbox" name="accomodation[]" value="Communication Access in Real-Time (CART services)"> Communication Access in Real-Time (CART services)</label>
                                <label class="block align-middle text-xs uppercase"><input type="checkbox" name="accomodation[]" value="Large print"> Large print</label>
                                <label class="block align-middle text-xs uppercase"><input type="checkbox" name="accomodation[]" value="Braille"> Braille</label>
                                <label class="block align-middle text-xs uppercase"><input type="checkbox" name="accomodation[]" value="Wheelchair access"> Wheelchair access</label>
                                <label class="block align-middle text-xs uppercase"><input type="checkbox" name="accomodation[]" value="Assistive Listening Device"> Assistive Listening Device</label>
                                <label class="block align-middle text-xs uppercase"><input type="checkbox" name="accomodation[]" value="An Assistant will accompany me"> An Assistant will accompany me</label>
                                <label class="block align-middle text-xs uppercase"><input type="checkbox" name="accomodation[]" value="Closed-captioned videos"> Closed-captioned videos</label>
                                <label class="block align-middle text-xs uppercase"><input type="checkbox" name="accomodation[]" value="Translator"> Translator<option>
                            </div>   
                                
                           
                        </div>

                        <div class="py-2 mt-6">
                            <button type="submit" class="uppercase text-center border border-gray-100 focus:outline-none bg-primary text-white font-semibold tracking-wider block w-3/4 md:w-1/2 m-auto py-3 rounded-lg focus:border-gray-700 hover:bg-purple-700">
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
    </script>
    <script>
        $("#accomodation").click(function () {
            $("#adiv").toggle(1000);
            if ($(this).is(':checked')) {
                $("#aoptions").prop('required', true);
            }else{
                $("#aoptions").prop('required', false);
            }
        })
    </script>
    <script src="<?php echo e(asset('js/multiselect.min.js')); ?>"></script>
    <script>
        document.multiselect('#aoptions')
		.setCheckBoxClick("checkboxAll", function(target, args) {
			console.log("Checkbox 'Select All' was clicked and got value ", args.checked);
		})
		.setCheckBoxClick("1", function(target, args) {
			console.log("Checkbox for item with value '1' was clicked and got value ", args.checked);
		});
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iamnotalone/public_html/iamnotalone/resources/views/create_event.blade.php ENDPATH**/ ?>