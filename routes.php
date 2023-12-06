<?php

// Get the requested URI
$request_uri = $_SERVER['REQUEST_URI'];

// Define routes and corresponding PHP files
$routes = [
    '/' => 'index.php',
    '/register' => 'register.php',
    '/login' => 'login.php',
    '/search' => 'search.php',
    '/choice_list' => 'choice_list.php',
    '/contact' => 'contact.php',
];

// Check if the requested URI matches any defined route
$matched_route = null;

foreach ($routes as $route => $file) {
    if (strpos($request_uri, $route) === 0) {
        $matched_route = $route;
        break;
    }
}

if ($matched_route !== null) {
    // Include the corresponding PHP file if it exists
    $file = $routes[$matched_route];
    $file_path = __DIR__ . '/' . $file;

    if (file_exists($file_path)) {
        include($file);
    } else {
        // Handle 404 Not Found if the file doesn't exist
        header("HTTP/1.0 404 Not Found");
        echo '404 Not Found';
        // You can customize the 404 page or redirect to a specific error page
        // include('404.php');
    }
} else {
    // Handle 404 Not Found if no route matches
    header("HTTP/1.0 404 Not Found");
    echo '404 Not Found';
    // You can customize the 404 page or redirect to a specific error page
    // include('404.php');
}
