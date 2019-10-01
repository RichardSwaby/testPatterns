<<?php
// header('Content-Type: text/plain');
require_once $_SERVER['DOCUMENT_ROOT'] . '\testPatterns\Configuration\config.php';

class serializeConnectionString {



  static function execute() {

      echo "Serializing connection string\n";
      clearstatcache();
      $conn = '"' . 'mysql:host=' . DB_HOST . ';' . 'dbname=' . DB_NAME . '",' . " '" . DB_USER . "', " . "'" . DB_PASS . "'";
      $result = serialize($conn);
      print_r ($result);
      $path = 'C:\xampp\htdocs\testPatterns\dsn';
      file_put_contents( $path, $result );
    }
}

phpinfo();
serializeConnectionString::execute();
 ?>
