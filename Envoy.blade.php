@servers(['praktik' => ['deploybot@139.162.166.91']])

@story('deploy')
    git
    composer
@endstory

@task('git')
    git pull origin main
@endtask

@task('composer')
    composer install
@endtask
