<?php
include $_INNER_PATH . "./models/Trip.php";

class TripController
{

	public static function index()
	{
		$trips = Trip::all();
		return $trips;
	}

	public static function store()
	{
		Trip::create();
	}

	public static function show()
	{
		$trip = Trip::find($_GET['id']);
		return $trip;
	}

	public static function update()
	{
		$trip = new Trip();
		$trip->id = $_POST['id'];
		$trip->month = $_POST['month'];
		$trip->maxPeopleAllowed = $_POST['maxPeopleAllowed'];
		$trip->distance = $_POST['distance'];
		$trip->withAnimals = $_POST['withAnimals'];
		$trip->image = $_FILES["image"]["name"];

		$trip->update();
	}

	public static function destroy()
	{
		Trip::destroy($_POST['id']);
	}

	public static function filter()
	{
		$trips = Trip::filter();
		return $trips;
	}
}
