# PHP CRUD MVC

    Demo Crud with PHP and MySql using composer

Clone the repository

    git clone git@github.com:rodineiti/php-crud-mvc.git

Switch to the repo folder

    cd php-crud-mvc
    
Install dependencies with composer
    
    composer install        
    
Edit file config.php, and set connection mysql

    define("DATA_LAYER_CONFIG", [
        "driver" => "mysql",
        "host" => "mysql",
        "port" => "3306",
        "dbname" => "database_base",
        "username" => "root",
        "passwd" => "root",
        "options" => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        ]
    ]);
    
Dump file database.sql into database

Run server php or your server (Wamp, Mamp, Xamp), and open in the browser localhost
  
    php -S localhost

Login
    
    email: rodinei@teste.com
    password: 123456

Prints


![image](https://user-images.githubusercontent.com/25492122/98299742-edcb2100-1f96-11eb-8895-f63d989e4ab0.png)


![image](https://user-images.githubusercontent.com/25492122/98299775-00ddf100-1f97-11eb-8430-d014f2b6b631.png)