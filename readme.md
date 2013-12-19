#chot-joldi-web

Web application for the bike messenger service localized for Bangladesh


#Installation instructions

### Server Requirements

- PHP version 5.3.7
- MCrypt PHP Extension

### Development Environment Settings

- Create a virtualhost pointing to public directory
- Do a composer update
- Change the *app/storage* and *public/uploads* directory write permission
- Create a mysql database and then
- Change database connection ** *app/config/database.php* **
- Open terminal for database migrations and seeding
- Type these command on terminal `php artisan migrate`  and `php artisan db:seed`
