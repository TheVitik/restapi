<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## REST API ENDPOINTS

- **POST** [/users](http://laratest.online/api/v1/users)
- **POST** [/categories](http://laratest.online/api/v1/categories)
- **POST** [/records](http://laratest.online/api/v1/records)
- **GET** [/categories](http://laratest.online/api/v1/categories)
- **GET** [/records](http://laratest.online/api/v1/records)

Site is deployed on VPS Server Ubuntu 18.04. Has default technology stack LEMP (Linux, Nginx, MySQL, PHP)

Domain name: **laratest.online**. Nameservers and DNS records was configured, so domain direct to the server IP address. NGINX config process request to host and opens needed website by domain, so its our lab.

Application saves data to cache.

## HOW TO DEPLOY
- Download [PHP 8+](https://www.php.net/downloads) and add php.exe to PATH
- Download [Composer](https://getcomposer.org/download/) install and add to PATH
- Download [MySQL Server](https://dev.mysql.com/downloads/mysql/) and install
- Clone the project and open project folder
- Run commnad **composer install**
- Open .env file and change database credentials
- Run command **php artisan migrate**
- Run command **php artisan serve**
