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