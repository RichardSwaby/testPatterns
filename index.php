<?php
include "Controller/frontController.php";
//echo 'about to create a new controller<br>';
$controller = new Controller();
// getContext will get the $_REQUEST variables and store them in array $params in $context
$context = $controller->getContext();

$controller->process();
 ?>
