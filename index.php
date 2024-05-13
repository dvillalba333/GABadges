<?php
session_start();

require_once('config.php');
require_once('Controller.php');

//initialized all the variables
$option=0;
$code=0;
$code2=0;
$parameters=0;
$date=0;

//Try to do more security and check the type of the parameters that are received
if (isset($_GET["option"])) 		$option = $_GET["option"];
if (isset($_GET["code"])) 			$code = $_GET["code"];
if (isset($_GET["code2"])) 			$code2 = $_GET["code2"];
if (isset($_GET["parameters"])) 	$parameters = $_GET["parameters"];
if (isset($_GET["date"])) 			$date = $_GET["date"];
if (isset($_POST["option"])) 		$option = $_POST["option"];
if (isset($_POST["code"])) 			$code = $_POST["code"];
if (isset($_POST["code2"])) 		$code2 = $_POST["code2"];
if (isset($_POST["parameters"])) 	$parameters = $_POST["parameters"];
if (isset($_POST["date"])) 			$date = $_POST["date"];
//Main call to the general functions
try {
	$controller = new Controller();
	$controller->setOption($option);
	$controller->setCode($code);
	$controller->setCode2($code2);
	$controller->setParameters($parameters);
	$controller->setDate($date);	

	$controller->init();
} catch (Exception $e) {
	echo $e->getMessage();
}
?>