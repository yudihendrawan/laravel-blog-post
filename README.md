


## How to Install this Project
Preparation
1. Has a CLI/Command Line Interface in the form of Command Prompt (CMD) or Power Shell or Git Bash (hereinafter we call the terminal).
2. Have a Web Server (eg XAMPP) with PHP version at least 7.1.3.
3. Composer has been installed, check with the composer -V command via the terminal.
4. Have an internet connection (for the installation process).

Install

1. Download the Source Code from the Github repo laravel-blog-post in Zip form
2. Extract the zip file (source code) into the htdocs directory on XAMPP, for example htdocs/laravel-blog-post.
OR 
```git 
git clone https://github.com/yudihendrawan/laravel-blog-post.git
```

3. Via terminal, cd to the laravel-blog-post directory.
4. (According to the installation instructions) In the terminal, give the command This requires an internet connection.
```git 
composer install
```
5. Composer will install the package dependencies from the source code until it is finished.
6. Run the php artisan command, to test whether the Laravel artisan command works.
7. Create a new (empty) database in mysql (via phpmyadmin) with the name crud.
8. Duplicate the .env.example file, then rename it to .env.
9. Go back to the terminal, ```php artisan key:generate```.
10. Database connection settings in the .env file (DB_DATABASE, DB_USERNAME, DB_PASSWORD).
```env
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=crud
DB_USERNAME=root
DB_PASSWORD=
```
11. If you just want to create a table, run the ```php artisan migrate``` command. Check in phpmyadmin, the table should appear.
12. To create a public resource, you can use the ```php artisan storage:link``` command 
13. Once finished, run the ```php artisan serve``` command then it can be accessed by http://localhost:8000/
14. To be able to access added categories, you need a user with the admin role. for that, open php my admin. open the users table, edit the is_admin column to 1 or (True). default is 0 or (False)