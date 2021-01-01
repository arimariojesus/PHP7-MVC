<?php
/*
 * autoload - Responsible for automatic loading of classes
*/

// the spl_autoload_register function, records any number autoloaders, allowing classes and interfaces to be automatically loaded.
spl_autoload_register(function ($class) {
  // directory list to search for classes
  $directories = [
    'Libraries',
    'Helpers'
  ];

  // go through directories
  foreach($directories as $directory) {
    // the __DIR__ constant returns the current file directory
    // DIRECTORY_SEPARATOR is the separator used to browse directories
    $file = __DIR__.DIRECTORY_SEPARATOR.$directory.DIRECTORY_SEPARATOR.$class.'.php';

    // checks if the class file exists
    if(file_exists($file)) {
      // includes the class file
      require_once($file);
    }
  }
});

?>