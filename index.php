<?php 

    declare(strict_types= 1);

    //autoload classes automatically
    spl_autoload_register (function ($class) {
        require __DIR__ . "/src/$class.php";
    });

    //error handling
    set_exception_handler("ErrorHandler::handleException");

    header("Content-type: application/json; charset=UTF-8");

    //returns an array of the url parts
    $parts = explode("/" , $_SERVER["REQUEST_URI"]);
    
    if($parts[1] != "phpapitest" || $parts[2] != "products") {
        //if the url isnt phpapitest/products, return a 404 error
        http_response_code(404);
        exit;
    }

    $id = $parts[3] ?? null;
    
    //database connection
    $database= new Database("localhost","product_db","root","");

    $database->getConnection();

    $gateway = new ProductGateway($database);

    $controller = new ProductController($gateway);
    
    //prints request method
    $controller->processRequest($_SERVER["REQUEST_METHOD"], $id);


?>