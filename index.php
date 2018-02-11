<?php 
require 'vendor/autoload.php';

 $path = parse_url( trim( $_SERVER['REQUEST_URI'], '/' ), PHP_URL_PATH);

 $routes = [
  '' => 'views/home.php',
  'about' => 'views/about.php',
  'author' => 'views/author.php',
  'category' => 'views/category.php',
  'post' => 'views/post.php'
 ];

 if (array_key_exists($path, $routes)) {
  require $routes[$path] ;
 }else {
  require 'views/notfound.php';
 }