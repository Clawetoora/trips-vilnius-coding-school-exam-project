<?php

include $_INNER_PATH . "./models/User.php";

class UserController
{

	public static function store()
	{
		User::create();
	}
	public static function show()
	{
		$users = User::find($_GET['id']);
		return $users;
	}
	public static function destroy()
	{
		User::destroy($_POST['deleteuser']);
	}

	// public static function update()
	// {
	// 	$user = new User();
	// 	$user->id = $_POST['id'];
	// 	$user->name = $_POST['month'];
	// 	$user->surname = $_POST['maxPeopleAllowed'];
	// 	$user->tripId = $_POST['distance'];

	// 	$user->update();
	// }

}
