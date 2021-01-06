<?php $message = isset($message) ? $message : null; ?>
<?php $production = isset($production) ? $production : null; ?>
<?php $task = isset($task) ? $task : null; ?>
<?php $__container->servers(['praktik' => ['deploybot@139.162.166.91']]); ?>

<?php
if($task == "pause"){
    if($production == 'yes'){
    $message = get_current_user() . " paused the production website.";
    } else {
    $message = get_current_user() . " paused the staging website.";
    }
}

if ($task == "resume"){
    if($production == 'yes'){
    $message = get_current_user() . " resumed the production website.";
    } else {
    $message = get_current_user() . " resumed the staging website.";
    }
} 

if($task == "deploy"){
    if($production == 'yes'){
    $message = get_current_user() . " probably messed up the production website right now. :(";
    } else {
    $message = get_current_user() . " just updated the staging website so changes can be extensively tested first :)";
    }
}
?>

<?php $__container->startTask('deploy'); ?>

<?php if ($production == 'yes'): ?>
    cd /home/deploybot/praktik
<?php else: ?>
    cd /home/deploybot/praktik-staging
<?php endif; ?>

php artisan down
git reset --hard HEAD
git pull
composer update
php artisan migrate --force
php artisan up

<?php $__container->endTask(); ?>

<?php $__container->startTask('pause'); ?>

<?php if ($production == 'yes'): ?>
    cd /home/deploybot/praktik
<?php else: ?>
    cd /home/deploybot/praktik-staging
<?php endif; ?>

php artisan down

<?php $__container->endTask(); ?>

<?php $__container->startTask('resume'); ?>

<?php if ($production == 'yes'): ?>
    cd /home/deploybot/praktik
<?php else: ?>
    cd /home/deploybot/praktik-staging
<?php endif; ?>

php artisan up

<?php $__container->endTask(); ?>

<?php $_vars = get_defined_vars(); $__container->finished(function() use ($_vars) { extract($_vars); 
<?php
if($task == "pause"){
    if($production == 'yes'){
    $message = get_current_user() . " paused the production website.";
    } else {
    $message = get_current_user() . " paused the staging website.";
    }
}

if ($task == "resume"){
    if($production == 'yes'){
    $message = get_current_user() . " resumed the production website.";
    } else {
    $message = get_current_user() . " resumed the staging website.";
    }
} 

if($task == "deploy"){
    if($production == 'yes'){
    $message = get_current_user() . " probably messed up the production website right now. :(";
    } else {
    $message = get_current_user() . " just updated the staging website so changes can be extensively tested first :)";
    }
}
?>

 if (! isset($task)) $task = null; Laravel\Envoy\Discord::make('https://discord.com/api/webhooks/796157285579096075/qflJ9Y8Fr6ROiU3dX9DMRzcjziBt25-RcUqb2ognY09SFt9R1F7bWXqfbYldOkOw0qNn', $message)->task($task)->send();
}); ?>
