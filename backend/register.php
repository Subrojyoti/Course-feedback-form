<?php
// require "connect.php";
require "resourses.php";
// define variables and set to empty values
// $first= $last= $username = $passwd = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $first = test_input($_POST["first"]);
    $last = test_input($_POST["last"]);
    $username = test_input($_POST["username"]);
    $passwd = test_input($_POST["password"]);
    try{
        insert($first, $last, $username, $passwd);
        header("Location: ../index.html");
    }
    catch(Exception $e){
        echo "Insertion failed<br>";
        header("Location: ../register.html");
    }


 
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>