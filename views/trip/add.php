<?php
$_INNER_PATH = $_SERVER['DOCUMENT_ROOT'] . "/php/trips";
$_OUTER_PATH = "http://" . $_SERVER['SERVER_NAME'] . "/php/trips";
include "$_INNER_PATH/components/head.php";
include $_INNER_PATH . "/routes.php";

?>
<div class="form-container">

<form class=" mt-3 login-form"id="forma" action="" method="post" enctype="multipart/form-data" >
    <div class="login-form form-group">
        <label for="f2">Month in which trip will take place:</label>
        <input type="text"name="month" id="f2" class="form-control"  placeholder="eg. January, February or etc..." required>
    </div>
    <div class="form-group">
        <label for="f2">Maximum amount of people allowed:</label>
        <input type="number" name="maxPeopleAllowed" id="f2" class="form-control"  placeholder="eg. 100" min="0" required>
    </div>
    <div class="form-group">

        <label for="f2">Distance of the trip</label>
        <input type="number"name="distance" id="f2" class="form-control"  placeholder="eg. 10km" min="0" required>
    </div>
        <select class="form-select" name="withAnimals">
            <option value="1">Animals allowed</option>
            <option value="0">Animals not allowed</option>
        </select>
    <div class="form-group mt-3">
        <label for="uploadfile">Upload a photo to promote your trip, or add trip map</label>
        <input class="form-control inputs-design" type="file" name="image" value="" />
    </div>
        <button type="submit" name="save" class="btn-save mt-3 mb-3">Add trip</button>
</form>
</div>

<?php include $_INNER_PATH . "/components/footer.php"?>
