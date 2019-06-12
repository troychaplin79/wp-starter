# WordPress Starter Theme

## Check NPM Version and Update

For more information about checking and updating local packages, [read this article](https://flaviocopes.com/update-npm-dependencies/)

-   `npm outdated` - checks for outdated npm packages
-   `npm list -g` - generate complete list of global packages
-   `npm list` - generate complete list of local packages
-   `npm list --depth=0` - generate list of local packages without their dependencies
-   `npm view YOUR_PACKAGE version` - check latest available version of a package
-   `npm view YOUR_PACKAGE dependencies` - view dependencies of the specified package

## Local NPM Compile Commands

-   `npm run dev` - compiles all src files
-   `npm run watch` - compiles all src scss and img files on save
-   `npm run prod` - compiles and minifies all src files

## Composer and Server

### Local and Dev Environments

-   `COMPOSER=composer.dev.json composer update` - update env with git tracked repos
-   `COMPOSER=composer.dev.json composer update --no-interaction --prefer-dist` - update env and generate new lock file
-   `COMPOSER=composer.dev.json composer install --no-interaction --prefer-dist` - update on server if uploading new lock file

### Production Environments

-   `composer update` - update env with git tracked repos
-   `composer update --no-interaction --prefer-dist` - update env and generate new lock file
-   `composer install --no-interaction --prefer-dist` - update on server if uploading new lock file

### Release and Deployment

More to follow
