<?php
/*
 * Configuration file
*/

define('DB', [
  'HOST' => 'localhost',
  'USER' => 'root',
  'PASSWORD' => '',
  'BASE' => 'framework',
  'PORT' => '3306'
]);

// __FILE__ - Magic constant. Returns of complete path and name of file.

//dirname - returns the path by removing the current directory/file
define('APP', dirname(__FILE__));
define('URL', 'http://localhost/framework');
define('APP_NAME', 'Curso de PHP7 OOP e MVC');

const APP_VERSION = '1.0.0';

?>