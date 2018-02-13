<?php 
require 'vendor/autoload.php';
session_start();

 $path = parse_url( trim( $_SERVER['REQUEST_URI'], '/' ), PHP_URL_PATH);

 $routes = [
  '' => 'views/frontend/home.php',
  'about' => 'views/frontend/about.php',
  'author' => 'views/frontend/author.php',
  'category' => 'views/frontend/category.php',
  'post' => 'views/frontend/post.php',

  //guests user
  'login' => 'views/frontend/login.php',
  'register' => 'views/frontend/register.php',

  //authenticate user
  'logout' => 'views/frontend/logout.php',
 ];
 $guest_routes = ['login', 'register'];
 $auth_routes = ['logout'];

 if (array_key_exists($path, $routes)) {
  if (in_array($path, $auth_routes)) {
    if (is_authenticate()) {
      require $routes[$path] ;
    } else {
      header('Location: /login');
    }
  } else if (in_array($path, $guest_routes)) {
    if (is_authenticate()) {
      header('Location: /');
    } else {
      require $routes[$path] ;
    }
  } else {
    require $routes[$path] ;
  }
 }else {
  require 'views/frontend/notfound.php';
 }