<?php
// include "./components/head.php";
$_INNER_PATH = $_SERVER['DOCUMENT_ROOT'] . "/php/trips";
$_OUTER_PATH = "http://" . $_SERVER['SERVER_NAME'] . "/php/trips";
include $_INNER_PATH . "/controllers/TripController.php";
include $_INNER_PATH . "/controllers/UserController.php";

$edit = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['save'])) {
		print_r($_POST['save']);
		TripController::store();
		header("Location: http://" . $_SERVER['SERVER_NAME'] . "/php/trips/index.php");
		die;

		print_r($_POST);
	}
	if (isset($_POST['edit'])) {

		$trip = TripController::show();
		$edit = true;
	}

	if (isset($_POST['update'])) {

		TripController::update();
		header("Location: http://" . $_SERVER['SERVER_NAME'] . "/php/trips/index.php");
		die;
	}

	if (isset($_POST['destroy'])) {
		TripController::destroy();
		header("Location: http://" . $_SERVER['SERVER_NAME'] . "/php/trips/index.php");
		die;
	}
	if (isset($_POST['registeruser'])) {
		print_r($_POST['registeruser']);
		UserController::store();
		header("Location: http://" . $_SERVER['SERVER_NAME'] . "/php/trips/index.php");
		die;

		print_r($_POST);
	}

	if (isset($_POST['deleteuser'])) {
		print_r($_POST['deleteuser']);
		UserController::destroy();
		header("Location: http://" . $_SERVER['SERVER_NAME'] . "/php/trips/index.php");
		die;

		print_r($_POST);
	}
}
if ($_SERVER['REQUEST_METHOD'] == "GET") {

	if (isset($_GET['filter']) || isset($_GET['from']) || isset($_GET['to']) || isset($_GET['sort']) || isset($_GET['frompeople']) || isset($_GET['topeople']) || isset($_GET['withAnimals'])) {
		$trips = TripController::filter();
	} else {

		$trips = TripController::index();
	}

	if (isset($_GET['edit'])) {
		$trip = TripController::show($_GET['id']);
	}

	// if (isset($_GET['updateuser'])) {
	// 	$trip = UserController::show($_GET['updateuser']);
	// }

	if (count($_GET) == 0) {
		$trips = TripController::index();
	}

	if (isset($_GET['show'])) {
		$trip = TripController::show($_GET['id']);
		$users = UserController::show($_GET['id']);
	}

}
