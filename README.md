## Steps

1. Clone the repo from Github.
2. Run `composer install`.
3. Create *config/db.php* from *config/db.php.dist* file and add your DB parameters. Don't delete the *.dist* file, it must be kept.
```php
define('APP_DB_HOST', 'your_db_host');
define('APP_DB_NAME', 'your_db_name');
define('APP_DB_USER', 'your_db_user_wich_is_not_root');
define('APP_DB_PWD', 'your_db_password');
```
4. Import `simple-auth.sql` in your SQL server,
5. Run the internal PHP webserver with `php -S localhost:8000 -t public/`. The option `-t` with `public` as parameter means your localhost will target the `/public` folder.
6. Go to `localhost:8000` with your favorite browser.
7. From this starter kit, create your own web application.

## URLs availables

* Home page at [localhost:8000/](localhost:8000/)


## TODO

### SecurityController methods :

- route for login (email + password) - (TIPS: use session to keep user logged after login)
- route for register (email + password + password2, hash password with `md5()`)

### UserManger methods :

- insert 
- selectOneByEmail

### Lock access to home from user not logged

### BONUS :: Lock access to /admin/index from user not logged with admin role