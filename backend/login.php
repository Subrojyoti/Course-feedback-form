<?php
// require "connect.php";
require "resourses.php";
// define variables and set to empty values
$username = $passwd = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = test_input($_POST["username"]);
  $passwd = test_input($_POST["pass"]);
  validate($username, $passwd);
//   header("Location: ../feedback.html");
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
