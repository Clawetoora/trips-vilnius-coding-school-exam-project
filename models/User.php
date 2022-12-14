<?php

// include $_INNER_PATH . "./models/DB.php";

class User
{
	public $id;
	public $name;
	public $surname;
	public $tripId;

	public function __construct($id = null, $name = null, $surname = null, $tripId = null)
	{
		$this->id = $id;
		$this->name = $name;
		$this->surname = $surname;
		$this->tripId = $tripId;

	}
	public static function create()
	{
		$_INNER_PATH = $_SERVER['DOCUMENT_ROOT'] . "/php/trips";

		$db = new DB();
		$stmt = $db->conn->prepare("INSERT INTO `participants`( `name`, `surname`, `trip_id`) VALUES (?,?,?)");
		$stmt->bind_param("ssi", $_POST['name'], $_POST['surname'], $_POST['tripId']);

		$stmt->execute();
		$stmt->close();
		$db->conn->close();

	}
	public static function find($id)
	{
		$users = [];
		$db = new DB();
		$query = "SELECT * FROM `participants` where `trip_id`=" . $id;
		$result = $db->conn->query($query);
		while ($row = $result->fetch_assoc()) {
			$users[] = new User($row['id'], $row['name'], $row['surname']);
		}
		$db->conn->close();
		return $users;
	}

	public static function destroy()
	{
		$db = new DB();
		$stmt = $db->conn->prepare("DELETE FROM `participants` WHERE `id` = ?");
		$stmt->bind_param("i", $_POST['deleteuser']);
		$stmt->execute();
		$stmt->close();
		$db->conn->close();
	}

}
