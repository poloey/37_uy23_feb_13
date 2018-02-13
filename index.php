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

 if (array_key_exists($path, $routes)) {
  require $routes[$path] ;
 }else {
  require 'views/frontend/notfound.php';
 }