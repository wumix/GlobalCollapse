<?php

/**
 *
 * Updates drug prices on darknet
 *
 * This script updates the prices of drugs on the Darknet page, based on their min and max price.
 * The script is run every 5 hours via a task runner provided by the hosting provider.
 *
 */

if(true) {
  if(true) {
    $user = 'root';
    $password = 'rootroot';
    $db = 'globalcollapse';
    $host = 'localhost';
    $port = 3306;

    $link = mysqli_init();
    $success = mysqli_real_connect(
      $link,
      $host,
      $user,
      $password,
      $db,
      $port
    );

    for ($i = 1; $i <= 5; $i++) {
      $drug = mysqli_query($link, "SELECT * FROM `drugs` WHERE `id` = '$i' LIMIT 1");
      $row = mysqli_fetch_assoc($drug);
      $pastprice = $row['price'];
      $min = $row['min'];
      $max = $row['max'];
      $newprice = rand($min, $max);
      mysqli_query($link, "UPDATE `drugs` SET `price` = '$newprice', `past_price` = '$pastprice', `updated` = now() WHERE `id` = '$i'");
    }
    mysqli_close($link);
    header("Location: https://www.google.com");
    exit;
  } else {
    header("Location: https://www.google.com");
    exit;
  }
} else {
  header("Location: https://www.google.com");
  exit;
}

?>
