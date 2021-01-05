@servers(['praktik' => ['deploybot@139.162.166.91']])

@story('deploy')
git
composer
@endstory

@task('git')

@if ($production == 'yes')
    cd /home/deploybot/praktik
@else
    cd /home/deploybot/praktik-staging
@endif

git pull

@endtask

@task('composer')

@if ($production == 'yes')
    cd /home/deploybot/praktik

    @setup
    $message = get_current_user() . " probably messed up production right now. :(";
    @endsetup
@else
    cd /home/deploybot/praktik-staging

    @setup
    $message = get_current_user() . " just updated the staging website so changes can be extensively tested first :)";
    @endsetup
@endif

composer install

@finished
@discord('https://discord.com/api/webhooks/796157285579096075/qflJ9Y8Fr6ROiU3dX9DMRzcjziBt25-RcUqb2ognY09SFt9R1F7bWXqfbYldOkOw0qNn', $message)
@endfinished

@endtask