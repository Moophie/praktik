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
@else
    cd /home/deploybot/praktik-staging
@endif
composer install

@endtask
