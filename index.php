<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '\testPatterns\Controller\FrontController.php';
use Controller\FrontController;
//echo 'about to create a new controller<br>';
$controller = new FrontController();
// getContext will get the $_REQUEST variables and store them in array $params in $context
$context = $controller->getContext();

$controller->process();
 ?>
