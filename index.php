<?php 
    //returns an array of the url parts
    $parts = explode("/" , $_SERVER["REQUEST_URI"]);
    
    if($parts[1] != "phpapitest" || $parts[2] != "products") {
        //if the url isnt phpapitest/products, return a 404 error
        http_response_code(404);
        exit;
    }

    $id = $parts[2] ?? null;
    
    var_dump($id);

    
?>