<!-- The server and user that hosts the website: authentication through api-key -->
@servers(['praktik' => ['deploybot@139.162.166.91']])

<!-- Deploy the project to the server -->
<!-- Use the flag --production=yes to deploy to production -->
@task('deploy')

@if ($production == 'yes')
    cd /home/deploybot/praktik
@else
    cd /home/deploybot/praktik-staging
@endif

php artisan down
git reset --hard HEAD
git pull origin main
<!-- Composer install, not update: newer versions on the server might break the application -->
composer install
php artisan migrate --force
php artisan up

@endtask

<!-- Pause the server websites -->
@task('pause')

@if ($production == 'yes')
    cd /home/deploybot/praktik
@else
    cd /home/deploybot/praktik-staging
@endif

php artisan down

@endtask

<!-- Resume the server websites -->
@task('resume')

@if ($production == 'yes')
    cd /home/deploybot/praktik
@else
    cd /home/deploybot/praktik-staging
@endif

php artisan up

@endtask

@after

<!-- Formulate the appropriate message based on task and production vs. staging -->
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

<!-- Send the message to the Discord server -->
@discord('https://discord.com/api/webhooks/796157285579096075/qflJ9Y8Fr6ROiU3dX9DMRzcjziBt25-RcUqb2ognY09SFt9R1F7bWXqfbYldOkOw0qNn', $message)

@endafter