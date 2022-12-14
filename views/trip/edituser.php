<?php
$_INNER_PATH = $_SERVER['DOCUMENT_ROOT'] . "/php/trips";
$_OUTER_PATH = "http://" . $_SERVER['SERVER_NAME'] . "/php/trips";
include "$_INNER_PATH/components/head.php";
include $_INNER_PATH . "/routes.php";
?>

<div class="form-container">

            <form class="login-form" action="" method ="POST">
                <h3>Register for a trip</h3>
                <label for="">Name</label>
                <input type="text" name="name" >
                <label for="">Surname</label>
                <input type="text" name="surname" >
                <label for="">To which trip</label>
                <select class="form-select" name="tripId">
         <?php foreach ($trips as $trip) {?>
            <option value="<?=$trip->id?>"><?=$trip->month?></option>
        <?php }?>
    </select>
    <button type="submit" name="registeruser">Register</button>
            </form>

    </div>