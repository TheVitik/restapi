<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

** Variant 3  -  IT-03 = 3%3 = 0

## REST API ENDPOINTS

- **POST** [/register](http://laratest.online/api/v3/login)
- **POST** [/login](http://laratest.online/api/v3/register)
- **POST** [/categories](http://laratest.online/api/v3/categories)
- **POST** [/records](http://laratest.online/api/v3/records)
- **GET** [/categories](http://laratest.online/api/v3/categories)
- **GET** [/records](http://laratest.online/api/v3/records)
- **GET** [/accounts](http://laratest.online/api/v3/accounts)
- **PATCH** [/accounts/{id}](http://laratest.online/api/v3/accounts/1)

Site is deployed on VPS Server Ubuntu 18.04. Has default technology stack LEMP (Linux, Nginx, MySQL, PHP)

Domain name: **laratest.online**. Nameservers and DNS records was configured, so domain direct to the server IP address. NGINX config process request to host and opens needed website by domain, so its our lab.

Application saves data to database.
Authorization via Bearer Token.

## HOW TO DEPLOY
- Download [PHP 8+](https://www.php.net/downloads) and add php.exe to PATH
- Download [Composer](https://getcomposer.org/download/) install and add to PATH
- Download [MySQL Server](https://dev.mysql.com/downloads/mysql/) and install
- Clone the project and open project folder
- Run commnad **composer install**
- Open .env file and change database credentials
- Run command **php artisan migrate**
- Run command **php artisan serve**
