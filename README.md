# Wuser

Wuser is a simple application that use WP and React to fetch and display a table of user and the user details
 
After installation, it will create a default endpoint ```{yourdomain}/wuser```. When you access this endpoint, it will show the user list. Click each list row for showing the user's details.

## Installation

Go to your ```/wp-content/plugins``` then clone this responsive or you could download the zip file and extract the wuser folder to ```/wp-content/plugins```. Active plugin in your CMS.

### Composer

The composer is not required to run the plugin and display the user list, user details on the endpoint. 
For PHP Unit Test run ```composer install``` in the ```/wp-content/plugins/wuser``` directory

### Test

Please ensure that  you you are in ```/wp-content/plugins/wuser``` and ran ```composer install```
To test,  run the following command:
```./vendor/bin/phpunit```

###  Frontend
Yarn are required to compiler the css and js for the FrontEnd showing the results.
Usally the yarn are install by simply 

```npm install --global yarn```  [more details](https://classic.yarnpkg.com/lang/en/docs/install) 
After yarn installed you could start to compline the css and js 

```yarn build```

## License and Copyright

Copyright (c) 2022 Warren Nguyen.

