<?php include "./components/head.php";
include $_INNER_PATH . "/routes.php";
?>
      <div class="container d-flex flex-column">
      <div class="hero">
      <div class="filtras">
        <?php include $_INNER_PATH . "/components/filter.php"?>
      </div>
      </div>

      <?php foreach ($trips as $trip) {?>

        <a href="<?=$_OUTER_PATH . '/views/trip/show.php?show=' . "&id=$trip->id"?>" class="trip mb-3 text-decoration-none">
          <div class="img-container">
            <img src="<?php
if ($trip->image == null) {
	echo "./images/default1.jpg";
} else {

	echo "./images/" . $trip->image;
}?>" alt="" />

          </div>
          <div class="about-container">
          <h2 id="trip-title">The trip will take place in: <?=$trip->month?></h2>
          <p id="about-trip">
            <?php
              if ($trip->withAnimals) {
                echo "with animals";
              } else {
                echo "without animals";
              }
                ?>
          </p>
            <h3 id="max-people">Distance: <?=$trip->distance?>
            km</h3>
            <p id="about-trip">
            Max people allowed <?=$trip->maxPeopleAllowed?>
              </p>
          </div>
          <input type="hidden" name="id" value=" <?=$trip->id?>">
        </a>


        <?php }?>

        </div>
      </div>
    </div>


<?php include $_INNER_PATH . "/components/footer.php"?>

