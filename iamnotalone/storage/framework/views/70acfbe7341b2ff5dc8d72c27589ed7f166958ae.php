<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e($event->name); ?> event Approved</title>
</head>
<body>
    <p>Dear <?php echo e($user->first_name); ?>,</p>
    <p>
        Your event <?php echo e($event->name); ?> has been approved and is now visible for intending participants to view and register 
        on our website.
    </p>
    <p>
        Thanks for partnering with us.
    </p>
</body>
</html><?php /**PATH /home/iamnotalone/public_html/iamnotalone/resources/views/email/approved_event.blade.php ENDPATH**/ ?>