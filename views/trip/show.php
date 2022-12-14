<?php
$_INNER_PATH = $_SERVER['DOCUMENT_ROOT'] . "/php/trips";
$_OUTER_PATH = "http://" . $_SERVER['SERVER_NAME'] . "/php/trips";
include "$_INNER_PATH/components/head.php";
include $_INNER_PATH . "/routes.php";

?>

<div class="container">

    <div class="trip-card">
        <div class="trip-card-img">

            <img src="<?php
if ($trip->image == null) {
	echo $_OUTER_PATH . "/images/default1.jpg";
} else {

	echo $_OUTER_PATH . "/images/" . $trip->image;
}?>" alt="" />
        </img>

        </div>
        <div class="trip-card-text">
        <h1><?=$trip->month?></h1>
        <h3><?php if ($trip->withAnimals) {
	echo "With animals";
} else {
	echo "Without animals";
}
?></h3>
        <p>Max people allowed <?=$trip->maxPeopleAllowed?></p>
        <p>Distance: <?=$trip->distance?>  km</p>
        <div>
            <p>People already registered for this trip:</p>

            <table class="table">
                <th>Name</th>
                <th>Surname</th>
                <th>Delete registration</th>
                <!-- <th>Update info</th> -->
                <?php
foreach ($users as $user) {
	echo '<tr>';
	echo '<td>' . $user->name . '</td>';
	echo '<td>' . $user->surname . '</td>';
	echo '<td>' . '<form action="" method="post">
    <input type="hidden" name="deleteuser" value="' . $user->id . '">
    <button class="btn-delete"type="submit">Delete</button>
    </form>' . '</td>';
	// echo '<td>' . '<form action="' . $_OUTER_PATH . '/views/trip/edituser.php " method="get">
	// <input type="hidden" name="updateuser" value="' . $user->id . '">
	// <button class="btn-edit"type="submit">Update</button>
	// </form>' . '</td>';
	echo '</tr>';
}?>
        </table>

    </div>

        </div>
        <div class="edit-delete">
        <form action="<?=$_OUTER_PATH . '/views/trip/edit.php'?>" method="get">
            <input type="hidden" name="id" value="<?=$trip->id?>">
            <button type="submit" name="edit" class="btn-edit">edit</button>
        </form>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?=$trip->id?>">
            <button type="submit" name="destroy" class="btn-delete">delete</button>
        </form>
        </div>


</div>


<?php include $_INNER_PATH . "/components/footer.php"?>




