<?php
session_start();

define('DB_HOST', 'sql101.infinityfree.com');
define('DB_USERNAME', 'if0_35491010');
define('DB_PASSWORD', '2OQ9vFRU4Ne');
define('DB_NAME', 'if0_35491010_db_music');

$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
