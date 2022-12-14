<?php

include $_INNER_PATH . "./models/DB.php";

class Trip
{
	public $id;
	public $month;
	public $maxPeopleAllowed;
	public $distance;
	public $withAnimals;
	public $image;

	public function __construct($id = null, $month = null, $maxPeopleAllowed = null, $distance = null, $withAnimals = null, $image = null)
	{
		$this->id = $id;
		$this->month = $month;
		$this->maxPeopleAllowed = $maxPeopleAllowed;
		$this->distance = $distance;
		$this->withAnimals = $withAnimals;
		$this->image = $image;
	}

	public static function all()
	{
		$trips = [];
		$db = new DB();
		$query = "SELECT * from `trips`";
		$result = $db->conn->query($query);

		while ($row = $result->fetch_assoc()) {
			$trips[] = new Trip($row['id'], $row['month'], $row['max_people_allowed'], $row['distance'], $row['with_animals'], $row['image']);
		}
		$db->conn->close();

		return $trips;
	}

	public static function create()
	{
		$_INNER_PATH = $_SERVER['DOCUMENT_ROOT'] . "/php/trips";

		$db = new DB();
		$filename = $_FILES["image"]["name"];
		$tempname = $_FILES["image"]["tmp_name"];
		$folder = $_INNER_PATH . "/images/" . $filename;
		$stmt = $db->conn->prepare("INSERT INTO `trips`( `month`, `max_people_allowed`, `distance`,`with_animals`, `image`) VALUES (?,?,?,?,?)");
		$stmt->bind_param("siiis", $_POST['month'], $_POST['maxPeopleAllowed'], $_POST['distance'], $_POST['withAnimals'], $filename);
		if (move_uploaded_file($tempname, $folder)) {
			echo "<h3>  Image uploaded successfully!</h3>";
		} else {
			echo "<h3>  Failed to upload image!</h3>";
		}
		$stmt->execute();
		$stmt->close();
		$db->conn->close();

	}

	public static function find($id)
	{
		$trip = new Trip();
		$db = new DB();
		$query = "SELECT * FROM `trips` where `id`=" . $id;
		$result = $db->conn->query($query);
		while ($row = $result->fetch_assoc()) {
			$trip = new Trip($row['id'], $row['month'], $row['max_people_allowed'], $row['distance'], $row['with_animals'], $row['image']);
		}
		$db->conn->close();
		return $trip;
	}

	public function update()
	{
		$_INNER_PATH = $_SERVER['DOCUMENT_ROOT'] . "/php/trips";
		$filename = $_FILES["image"]["name"];
		$tempname = $_FILES["image"]["tmp_name"];
		$folder = $_INNER_PATH . "/images/" . $filename;
		$db = new DB();
		$stmt = $db->conn->prepare("UPDATE `trips` SET `month`= ? ,`max_people_allowed`= ? ,`distance`= ? , `with_animals`= ?, `image`= ? WHERE `id` = ?");
		$stmt->bind_param("siiisi", $_POST['month'], $_POST['maxPeopleAllowed'], $_POST['distance'], $_POST['withAnimals'], $filename, $_POST['id']);
		$stmt->execute();
		if (move_uploaded_file($tempname, $folder)) {
			echo "<h3>  Image uploaded successfully!</h3>";
		} else {
			echo "<h3>  Failed to upload image!</h3>";
		}
		$stmt->close();
		$db->conn->close();
	}

	public static function destroy()
	{
		$db = new DB();
		$stmt = $db->conn->prepare("DELETE FROM `trips` WHERE `id` = ?");
		$stmt->bind_param("i", $_POST['id']);
		$stmt->execute();

		$stmt->close();
		$db->conn->close();
	}

	public static function filter()
	{
		// print_r($_GET);die;
		$trips = [];
		$db = new DB();
		$query = "SELECT * FROM `trips` ";
		$first = true;
		if (!isset($_GET['month'])) {
			$query .= "";
		} else if (($_GET['month'] != "")) {
			$first = false;
			$query .= "WHERE `month` LIKE  \"%" . $_GET['month'] . "%\"" . " ";
		}

		if ($_GET['from'] != "") {
			$query .= (($first) ? "WHERE" : "AND") . " `distance` >= " . $_GET['from'] . " ";
			$first = false;
		}
		if ($_GET['to'] != "") {
			$query .= (($first) ? "WHERE" : "AND") . " `distance` <= " . $_GET['to'] . " ";
			$first = false;
		}
		if ($_GET['frompeople'] != "") {
			$query .= (($first) ? "WHERE" : "AND") . " `max_people_allowed` >= " . $_GET['frompeople'] . " ";
			$first = false;
		}
		if ($_GET['topeople'] != "") {
			$query .= (($first) ? "WHERE" : "AND") . " `max_people_allowed` <= " . $_GET['topeople'] . " ";
			$first = false;
		}
		if (!isset($_GET['withAnimals'])) {
			$query .= "";

		} else {
			switch ($_GET['withAnimals']) {

				case '1':
					$query .= (($first) ? "WHERE" : "AND") . " `with_animals` = 0" . " ";
					$first = false;
					break;
				case '2':
					$query .= (($first) ? "WHERE" : "AND") . " `with_animals` = 1" . " ";
					$first = false;
					break;
			}
		}

		if (!isset($_GET['sort'])) {
			$query .= "";
		} else {

			switch ($_GET['sort']) {

				case '1':
					$query .= "ORDER BY `distance`";
					break;

				case '2':
					$query .= "ORDER BY `distance` DESC";
					break;

				case '3':
					$query .= "ORDER BY `max_people_allowed`";
					break;

				case '4':
					$query .= "ORDER BY `max_people_allowed` DESC";
					break;
			}
		}

		$result = $db->conn->query($query);

		while ($row = $result->fetch_assoc()) {
			$trips[] = new Trip($row['id'], $row['month'], $row['max_people_allowed'], $row['distance'], $row['with_animals'], $row['image']);
		}
		$db->conn->close();
		return $trips;
	}

}
