#!/bin/sh

env=$1

case $env in
	prod)
		project_root="/web/[%FOLDER%]"
		;;
	stage)
		project_root="/var/www/[%FOLDER%]"
		;;
esac

if [ -z "$project_root" ];
then
	exit 0
fi

lock_dir="/var/lock/.deploy-[%FOLDER%]-$env.lock"

if mkdir $lock_dir
then
    cd $project_root

    case $env in
        prod)
            git stash
            git pull
            ;;
        stage)
            sudo -u www-data -H git stash
            sudo -u www-data -H git pull
            ;;
    esac

    #composer selfupdate
    composer install

    #sh vendor/dimaninc/di_core/scripts/copy_core_static.sh

    cd assets
    #npm ci

    case $env in
        prod)
            gulp build
            ;;
        stage)
            sudo -u www-data -H gulp build
            ;;
    esac

    echo "Rebuilding caches..."

    case $env in
        prod)
            php $project_root"/scripts/rebuild_cache.php" env=$env
            ;;
        stage)
            sudo -u www-data -H php $project_root"/scripts/rebuild_cache.php" env=$env
            ;;
    esac

    echo "Template and Content caches rebuilt"

    rmdir $lock_dir
fi