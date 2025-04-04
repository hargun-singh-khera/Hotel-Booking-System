<?php 
  include 'includes/config/dbconnect.php';
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  // todo change it to default route for index.php and then add auth middleware
  // if(!isset($disableHeaderFooter) || !$disableHeaderFooter) {
  //   echo "disableHeaderFooter inside of header.php: " . $disableHeaderFooter;
  //   if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  //     header("location: login.php");
  //     exit;
  //   }
  // }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo (isset($title) && $title) ? $title : "Heritage - Simplifying Online Hotel Reservations"; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <?php if (!isset($disableHeaderFooter) || !$disableHeaderFooter) { ?>
    <header>
      <?php include 'includes/partials/nav.php'; ?>
    </header>
  <?php } ?>