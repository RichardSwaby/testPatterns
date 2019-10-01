<?php
class  CommandFactory {

  static function getCommand ( $action='Default') {

    $folders = array("creationalPatterns", "structuralPatterns", "behaviouralPatterns", "databasePatterns",
                    "EnterprisePatterns\Registry", "EnterprisePatterns\Command", "EnterprisePatterns\Controller");

    if ( preg_match('/\W/', $action ) ) {
      throw new Exception ("illegal characters in action");
    }

    while ($folder = array_shift($folders)) {
        $file = dirname(__DIR__) . DIRECTORY_SEPARATOR. "Model" . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . "{$action}.php";
        print_r ($file . "\n");
        if ( file_exists( $file ) ) {
          require_once( $file );
          $classname = 'Model' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $action;
          if (class_exists( $classname) ) {
             $cmd_class = new ReflectionClass($classname);
             print_r($cmd_class);
             // if ($cmd_class->isSubClassOf( Command ) ) {
               return $cmd_class->newinstance();
               break;
             // }
          }
          // $cmd = new $class();
          break;
        }
    }
  }
}
 ?>
