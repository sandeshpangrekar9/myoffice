About 'myoffice' application:-
-------------------------------

In order to develop this application, we have used Laravel version 10.10 and PHP version 8.2. To setup and run the app, please follow below steps:-

1) Update below things in .env file:-

APP_NAME='My Office'

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=myoffice
DB_USERNAME=root
DB_PASSWORD=


2) Run below command:-

composer update

3) Run below command:-

npm update

4) Run migrations as below:-

php artisan migrate

5) Run seeders as below:-

php artisan db:seed --class=CreateUsersSeeder

6) Run Laravel app using below command:-

php artisan serve

7) Before accessing app on browser, we can run below npm commands to compile npm assets. In general we run 'npm run dev' locally and 'npm run build' before we deploy our application.

npm run dev
npm run build

8) Access app on browser using below URL:-

http://localhost:8000/

9) As mentioned in step #5, we can have two user accounts created for us as below:-

Admin Credentials:-
------------------------
email:- admin@gmail.com
password:- 123456


User/Employee Credentials:-
------------------------
email:- user@gmail.com
password:- 123456

10) Admin will have full access for all the pages/links such 'dashboard', 'employees' and 'clients', while User/Employee login will have access for 'dashboard' and 'clients' pages/links.

11) Used Technology Stack:
---------------------------
Xampp Server + PHP + MySQL + Laravel + Bootstrap