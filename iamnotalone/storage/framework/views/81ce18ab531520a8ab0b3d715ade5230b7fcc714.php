
<?php $__env->startSection('content'); ?>

<div class="w-full px-4 justify-items-center mt-8">
    <input type="text" name="" id="search"
        class="block mx-auto border-2 text-lg text-center font-medium border-gray-100 focus:outline-none block w-full px-10 py-3 rounded-lg focus:border-gray-700"
        placeholder="Search by Activity Name, Activity Type, Activity Organizer, Location, Status">
</div>


<div class="mt-8 w-full">
    <table class="min-w-max w-full table-auto" id="table">
        <thead>
            <tr class="text-gray-600 uppercase text-sm leading-normal">
                <th class="py-6 px-6 text-center resize-x">Activity Name</th>
                <th class="py-6 px-6 text-center resize-x">Activity Type</th>
                <th class="py-6 px-6 text-center resize-x">Category</th>
                <th class="py-6 px-6 text-center resize-x">Organizer</th>
                <th class="py-6 px-6 text-center resize-x">Location</th>
                <th class="py-6 px-6 text-center resize-x">Status</th>
                <th></th>
            </tr>
        </thead>

        <tbody class="text-gray-600 text-sm font-medium" id="tbody">
            <?php if(count($approvedEvents)): ?>
            <?php $__currentLoopData = $approvedEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr class="bg-white my-3 text-center">
                <td class="pl-4 py-4 my-2 whitespace-nowrap">
                    <span class=""><?php echo e($event->name); ?></span>
                </td>
                <td class="text-center py-4 my-2">
                    <?php if($event->online && !$event->inperson): ?>
                    Online
                    <?php elseif($event->inperson && !$event->online): ?>
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
                    <span class="text-white bg-green-300 rounded-full font-bold py-2 px-4">Approved</span>
                    <?php elseif(!$event->approved): ?>
                    <span class="text-white bg-yellow-300 font-bold rounded-full py-2 px-4">Pending</span>
                    <?php else: ?>
                    <span class="text-white bg-red-600 rounded-full font-bold py-2 px-4">Declined</span>
                    <?php endif; ?>
                </td>
                <td class="text-center py-4 my-2">
                    <div class="relative">
                        <a href="#" class="relative z-2 block rounded-md bg-white p-2 focus:outline-none"
                            onclick="showHideMenu('op<?php echo e($event->id); ?>')">
                            <svg width="20" height="4" viewBox="0 0 20 4" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.81086 3.73333C1.60952 3.73333 0.63564 2.8976 0.63564 1.86667C0.63564 0.835735 1.60952 0 2.81086 0C4.0122 0 4.98608 0.835735 4.98608 1.86667C4.98608 2.8976 4.0122 3.73333 2.81086 3.73333Z"
                                    fill="#858585" />
                                <path
                                    d="M9.95808 3.73333C8.75674 3.73333 7.78286 2.8976 7.78286 1.86667C7.78286 0.835735 8.75674 0 9.95808 0C11.1594 0 12.1333 0.835735 12.1333 1.86667C12.1333 2.8976 11.1594 3.73333 9.95808 3.73333Z"
                                    fill="#858585" />
                                <path
                                    d="M17.1053 3.73333C15.904 3.73333 14.9301 2.8976 14.9301 1.86667C14.9301 0.835735 15.904 0 17.1053 0C18.3066 0 19.2805 0.835735 19.2805 1.86667C19.2805 2.8976 18.3066 3.73333 17.1053 3.73333Z"
                                    fill="#858585" />
                            </svg>
                        </a>

                        <div class="absolute right-0 mt-2 ml-10 w-32 bg-white rounded-md shadow-xl z-20 hidden"
                            id="op<?php echo e($event->id); ?>">
                            <a href="<?php echo e(route('admin.event.details', ['id'=>$event->id])); ?>"
                                class="block px-2 py-3 rounded text-sm capitalize text-gray-700 bg-gradient-to-r hover:from-purple-400 hover:via-pink-500 hover:to-red-500 hover: hover:text-white">
                                Activity Details
                            </a>
                            <a href="#eventModal" data-title=""
                                data-url="<?php echo e(route('admin.event.update', ['id'=>$event->id])); ?>"
                                data-event=<?php echo e(base64_encode(json_encode($event))); ?> rel="modal:open"
                                class="editEvent block px-2 py-3 rounded text-sm capitalize text-gray-700 bg-gradient-to-r hover:from-purple-400 hover:via-pink-500 hover:to-red-500 hover: hover:text-white"
                                title="Edit Event">
                                Edit Event
                            </a>
                            <?php if(!$event->approved): ?>
                            <a href="<?php echo e(route('admin.event.approve', ['id'=>$event->id])); ?>"
                                class="block px-2 py-3 rounded text-sm capitalize text-gray-700 bg-gradient-to-r hover:from-purple-400 hover:via-pink-500 hover:to-red-500 hover: hover:text-white">
                                Approve Activity
                            </a>
                            <a href="#" id="openModal"
                                class="block px-2 py-3 rounded text-sm capitalize text-gray-700 bg-gradient-to-r hover:from-purple-400 hover:via-pink-500 hover:to-red-500 hover: hover:text-white"
                                data-fname="<?php echo e($event->organizer->first_name); ?>"
                                data-lname="<?php echo e($event->organizer->last_name); ?>" data-uid="<?php echo e($event->user_id); ?>"
                                data-eid="<?php echo e($event->id); ?>" onclick="openModal(this)">
                                Delete Activity
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
<!-- Modal HTML embedded directly into document -->
<div id="eventModal" class="modal" style="width: 75%; max-width: 75%; padding: 5% 10%">
    <form class="text-center" method="POST" id="editEventForm" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <div class="py-2 text-left">
            <label for="event_name" class="uppercase block text-xs mb-2">Activity Name</label>
            <input type="text"
                class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 "
                placeholder="Activity name " id="event_name" name="title" value="" required />
        </div>

        <div class="py-2 text-left">
            <label for="event_description" class="uppercase block text-xs mb-2">Activity Description</label>
            <textarea cols="30" rows="4"
                class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-8 rounded-lg focus:border-gray-700"
                placeholder="Activity Description" id="event_description" name="description" required></textarea>
        </div>

        <div class="py-2 text-left">
            <label for="event_name" class="uppercase block text-xs mb-2">Banner</label>
            <input type="file"
                class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 "
                placeholder="Thumbnail" name="banner" accept="image/*" />
        </div>
        <div class="online">
            <div class="py-2 text-left">
                <a href="#"
                    class="capitalize text-center border-2 border-indigo-400 focus:outline-none bg-primary text-white font-medium tracking-wider w-3/4 sm:w-1/3 m-auto mb-4 block py-3 rounded-lg focus:border-gray-700 hover:bg-purple-600">
                    Online
                </a>
            </div>
            <div class="py-2 text-left">
                <div class="">
                    <div class="control-group">
                        <label class="radio" for="link_reg">
                            <input type="radio" name="radio_link" id="link_reg" value="registration_link"
                                style="margin: 0 5px 0 10px;">Registration Link
                        </label>
                        <label class="radio" for="link_event">
                            <input type="radio" name="radio_link" id="link_event" value="event_link"
                                style="margin: 0 5px 0 10px;">Event Link
                        </label>
                        <div class="py-2 text-left registration_link">
                            <label for="registration_link" class="uppercase block text-xs mb-2">Registration
                                Link</label>
                            <input type="url"
                                class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 registration_link"
                                placeholder="Registration link" id="registration_link" name="registration_link" />
                        </div>
                        <div class="py-2 text-left event_link">
                            <label for="event_link" class="uppercase block text-xs mb-2">Event Link</label>
                            <input type="url"
                                class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 event_link"
                                placeholder="Event link" id="event_link" name="link" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="in_person">
            <div class="py-2 text-left">
                <a href="#"
                    class="capitalize text-center border-2 border-indigo-400 focus:outline-none bg-primary text-white font-medium tracking-wider w-3/4 sm:w-1/3 m-auto mb-4 block py-3 rounded-lg focus:border-gray-700 hover:bg-purple-600">
                    In-Person
                </a>
            </div>

            <div class="">
                <div class="py-2 text-left">
                    <label for="event_name" class="uppercase block text-xs mb-2">Name of Venue</label>
                    <input type="text"
                        class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 "
                        placeholder="Name of Venue" id="venue" name="venue" />
                </div>

                <div class="py-2 text-left">
                    <label for="organizer" class="uppercase block text-xs mb-2">Address 1</label>
                    <input type="text"
                        class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 "
                        placeholder="Address 1" id="address1" name="address1" />
                </div>

                <div class="py-2 text-left">
                    <label for="organizer" class="uppercase block text-xs mb-2">Address 2</label>
                    <input type="text"
                        class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 "
                        placeholder="Address 2" id="address2" name="address2" />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 md:gap-4">
                    <div class="py-2 text-left">
                        <input type="text"
                            class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 "
                            placeholder="State" id="state" name="state" value="<?php echo e(old('state', '')); ?>" />

                    </div>
                    <div class="py-2 text-left">
                        <input type="text"
                            class="bg-white border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 "
                            placeholder="City" id="city" name="city" value="<?php echo e(old('city', '')); ?>" />

                    </div>
                </div>
            </div>
        </div>
        <div class="hybrid">
            <div class="py-2 text-left">
                <a href="#"
                    class="capitalize text-center border-2 border-indigo-400 focus:outline-none bg-primary text-white font-medium tracking-wider w-3/4 sm:w-1/3 m-auto mb-4 block py-3 rounded-lg focus:border-gray-700 hover:bg-purple-600">
                    Hybrid
                </a>
            </div>
            <div class="py-2 text-left">
                <label for="event_name" class="uppercase block text-xs mb-2">Name of Venue</label>
                <input type="text"
                    class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 "
                    placeholder="Name of Venue" name="hybrid_venue" id="hybrid_venue" />
            </div>

            <div class="py-2 text-left">
                <label for="organizer" class="uppercase block text-xs mb-2">Address 1</label>
                <input type="text"
                    class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 "
                    placeholder="Address 1" id="hybrid_address1" name="hybrid_address1" />
            </div>

            <div class="py-2 text-left">
                <label for="organizer" class="uppercase block text-xs mb-2">Address 2</label>
                <input type="text"
                    class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 "
                    placeholder="Address 2" id="hybrid_address2" name="hybrid_address2" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-4">
                <div class="py-2 text-left">
                    <input type="text"
                        class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 "
                        placeholder="State" id="hybrid_state" name="hybrid_state" value="<?php echo e(old('state', '')); ?>" />

                </div>
                <div class="py-2 text-left">
                    <input type="text"
                        class="bg-white border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 "
                        placeholder="City" id="hybrid_city" name="hybrid_city" value="<?php echo e(old('city', '')); ?>" />

                </div>
            </div>

            <div class="py-2 text-left">
                <label for="event_link" class="uppercase block text-xs mb-2">Event Link</label>
                <input type="url"
                    class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 "
                    placeholder="Event link" id="hybrid_event_link" name="hybrid_event_link" />
            </div>

            <div class="py-2 text-left">
                <label for="platform" class="uppercase block text-xs mb-2">Platform</label>
                <input type="text"
                    class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 "
                    placeholder="Platform" id="platform" name="platform" />
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
            <div class="py-2 text-left">
                <label for="event_name" class="uppercase block text-xs mb-2">Start Date</label>
                <input type="date"
                    class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 "
                    placeholder="State Date" name="start_date" id="start_date" value="<?php echo e($event->start_date); ?>" />
            </div>

            <div class="py-2 text-left">
                <label for="event_name" class="uppercase block text-xs mb-2">Start Time</label>
                <input type="time"
                    class="border text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 "
                    placeholder="Start Time" name="start_time" id="start_time" value="<?php echo e($event->start_time); ?>" />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
            <div class="py-2 text-left">
                <label for="event_name" class="uppercase block text-xs mb-2">End Date</label>
                <input type="date"
                    class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 "
                    placeholder="End date" name="end_date" id="end_date" value="<?php echo e($event->end_date); ?>" />
            </div>

            <div class="py-2 text-left">
                <label for="event_name" class="uppercase block text-xs mb-2">End Time</label>
                <input type="time"
                    class="border text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700"
                    placeholder="End Time" name="end_time" id="end_time" value="<?php echo e($event->end_time); ?>" />
            </div>
        </div>
        <input type="hidden" name="id" id="event_id" value="">
        <div class="py-2 mt-6">
            <button type="submit"
                class="border-2 text-sm border-gray-100 focus:outline-none bg-indigo-800 text-white font-medium uppercase tracking-wider block w-3/4 md:w-1/2  m-auto py-4 rounded-lg focus:border-gray-700 hover:bg-purple-700">
                Update Event
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    document.getElementById('approved').classList.add('active');
    $(function () {
        $(".event_link").hide();
        $(".registration_link").hide();
        $("#registration_link").attr("disabled", "disabled");
        $("#event_link").attr("disabled", "disabled");
        $("#link_event, #link_reg").click(function () {
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
        $(".online").hide()
        $(".hybrid").hide()
        $(".in_person").hide()
        // $("#link_event").prop("checked", false);
        // $("#link_reg").prop("checked", false);
        $(".editEvent").on('click', function () {
            var eventData = $(this).attr('data-event');
            var editUrl = $(this).attr('data-url');
            var event = JSON.parse(atob(eventData));
            $("#editEventForm").attr('action', editUrl);
            $("#event_name").val(event.name)
            $("#event_description").val(event.description)
            $("#event_description").val(event.description)
            $("#start_date").val(event.start_date)
            $("#start_time").val(event.start_time)
            $("#end_date").val(event.end_date)
            $("#end_time").val(event.end_time)
            $("#event_id").val(event.id)
            if (event.online && !event.inperson) {
                $(".online").show()
                $(".hybrid").hide()
                $(".in_person").hide()
                if (event.link) {
                    $("#link_event").click();
                    $("#event_link").val(event.link)
                } else {
                    $("#link_reg").click();
                    $("#registration_link").val(event.registration_link)
                }
            } else if (event.inperson && !event.online) {
                $(".in_person").show()
                $(".online").hide()
                $(".online").hide()
                $("#address1").val(event.address1)
                $("#address2").val(event.address2)
                $("#venue").val(event.venue)
                $("#state").val(event.state)
                $("#city").val(event.city)
            } else {
                $(".hybrid").show()
                $(".online").hide()
                $(".in_person").hide()
                $("#hybrid_address1").val(event.address1)
                $("#hybrid_address2").val(event.address2)
                $("#hybrid_venue").val(event.venue)
                $("#hybrid_state").val(event.state)
                $("#hybrid_city").val(event.city)
                $("#hybrid_event_link").val(event.link)
                $("#platform").val(event.platform)
            }
        });
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iamnotalone/public_html/iamnotalone/resources/views/admin/approved_events.blade.php ENDPATH**/ ?>