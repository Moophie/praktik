@servers(['praktik' => ['deploybot@139.162.166.91']])

@setup
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
@endsetup

@task('deploy')

@if ($production == 'yes')
    cd /home/deploybot/praktik
@else
    cd /home/deploybot/praktik-staging
@endif

php artisan down
git reset --hard HEAD
git pull origin main
composer update
php artisan migrate --force
php artisan up

@endtask

@task('pause')

@if ($production == 'yes')
    cd /home/deploybot/praktik
@else
    cd /home/deploybot/praktik-staging
@endif

php artisan down

@endtask

@task('resume')

@if ($production == 'yes')
    cd /home/deploybot/praktik
@else
    cd /home/deploybot/praktik-staging
@endif

php artisan up

@endtask

@after
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
@discord('https://discord.com/api/webhooks/796157285579096075/qflJ9Y8Fr6ROiU3dX9DMRzcjziBt25-RcUqb2ognY09SFt9R1F7bWXqfbYldOkOw0qNn', $message)
@endafter