# Wuser

Wuser is a simple application use WP and React to fetch and display a table of use and the user details
 
After installing, it will create a default enpoint {yourdomain}/wuser. When you access this enpoint it will show all the user list. Click each list row for more user's details.

## Installation

Go to you /wp-content/plugins then clone this responsive or you could download the zip file and extract the wuser folder to /wp-content/plugins.

### Composer

The composer are not requie for running the plugin and showing the user list, user details on the enpoint. 
For Autotest use need to run "composer install" in the /wp-content/plugins/wuser

### Test
Please making sure you you are in /wp-content/plugins/wuser and ran "composer install" 
Run command below for testing:
..."./vendor/bin/phpunit"...

###  Frontend
Yarn are required to compiler the css and js for the FrontEnd showing the results.
Usally the yarn are install by simply 
...npm install --global yarn...  [more details](https://classic.yarnpkg.com/lang/en/docs/install) 
After yarn installed you could start to compline the css and js 
...yarn build...

## License and Copyright

Copyright (c) 2022 Warren Nguyen.

