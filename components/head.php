<?php
session_start();
$_INNER_PATH = $_SERVER['DOCUMENT_ROOT'] . "/php/trips";
$_OUTER_PATH = "http://" . $_SERVER['SERVER_NAME'] . "/php/trips";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trip for you</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fragment+Mono&family=Kanit:ital,wght@0,300;0,400;1,700&display=swap" rel="stylesheet">

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="<?=$_OUTER_PATH . "/css/style.css"?>" />
  </head>
  <body>
    <div class="container">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="<?=$_OUTER_PATH?>/index.php">Trip for you</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

              <li class="nav-item">
                <a class="nav-link" href="<?=$_OUTER_PATH?>/views/trip/add.php">Add new trip</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=$_OUTER_PATH?>/views/trip/register.php">Register for a trip</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
