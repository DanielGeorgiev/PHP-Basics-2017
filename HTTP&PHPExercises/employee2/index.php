<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

// Load DB
include 'db_config.php';

// Load core classes
include 'core/Model.php';
include 'core/Controller.php';

// Load model classes - they extend Model.php
include 'model/AddressesModel.php';
include 'model/EmployeesModel.php';
include 'model/ProjectsModel.php';

// Load Controller class - it extends Controller.php
include 'controller/MainController.php';
include 'controller/EmployeeController.php';

$controller = (empty($_GET['controller']) || !isset($_GET['controller'])) ? 'Main' : $_GET['controller'];
$action = (empty($_GET['action']) || !isset($_GET['controller'])) ? 'main' : $_GET['action'];

$controller .= 'Controller';

if (class_exists($controller)) {
    $c = new $controller($db);
    $c->$action();
}else{
    include "view/header.php";
    include "view/error.php";
    include "view/footer.php";
}



