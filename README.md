# WordPress Starter Theme

## Local NPM Compile Commands

-   `npm run watch` - compiles all src scss and img files on save
-   `npm run dev` - creates a dev build, include ssh deployment
-   `npm run stage` - creates a staging build, include ssh deployment
-   `npm run prod` - creates a prod build, include ssh deployment

## Check NPM Version and Update

For more information about checking and updating local packages, [read this article](https://flaviocopes.com/update-npm-dependencies/)

-   `npm outdated` - checks for outdated npm packages
-   `npm list -g` - generate complete list of global packages
-   `npm list` - generate complete list of local packages
-   `npm list --depth=0` - generate list of local packages without their dependencies
-   `npm view YOUR_PACKAGE version` - check latest available version of a package
-   `npm view YOUR_PACKAGE dependencies` - view dependencies of the specified package
