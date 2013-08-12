<?php
/**
 * Bootstrap
 * 
 * @author Enrico Zimuel (enrico@zimuel.it)
 * @version 0.1
 */
set_include_path('.' . PATH_SEPARATOR . '../library/' . PATH_SEPARATOR . '../application/default/models/' . PATH_SEPARATOR . get_include_path());

require_once 'Initializer.php';
require_once 'Zend/Loader/Autoloader.php';
 
$autoloader = Zend_Loader_Autoloader::getInstance();
$autoloader->registerNamespace('Forms_');
		
// Prepare the front controller. 
$frontController = Zend_Controller_Front::getInstance(); 

// Change to 'production' parameter under production environemtn
$frontController->registerPlugin(new Initializer('test'));    

// Dispatch the request using the front controller. 
$frontController->dispatch(); 
?>

