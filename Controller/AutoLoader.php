<?php

function CommandAutoloader($class) {
  include dirname(__DIR__) . DIRECTORY_SEPARATOR . "{$class}.php";
}

spl_autoload_register('CommandAutoloader');
 ?>
