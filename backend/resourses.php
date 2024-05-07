<?php
require "connect.php";

session_start();

if(isset($_POST['logout'])){
    session_destroy();
    
    header("Location: ../index.html");
}


function insert($first, $last, $user_id, $pass){
  if($user_id != "ADMIN"){
    $name = $first." ".$last;
    $sql = "INSERT INTO users (name, user_id, pass)
    VALUES ('$name', '$user_id', '$pass')";
    try {
      $servername = "localhost";
$username = "root";
$password = "";
      $conn = new PDO("mysql:host=$servername;dbname=assign10_db", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // use exec() because no results are returned
      $conn->exec($sql);
      echo "New record created successfully";
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }
  else{
    echo "Username cannot be created<br>";
  }
    
}



function validate($user_id, $pass){
// SQL QUERY 
$query = "SELECT user_id, pass FROM users WHERE user_id = '$user_id' AND pass = '$pass';"; 
try
{   
  $servername = "localhost";
$username = "root";
$password = "";
  $conn = new PDO("mysql:host=$servername;dbname=assign10_db", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  
	$stmt = $conn->prepare($query); 
	// EXECUTING THE QUERY 
	$stmt->execute(); 
  

	$r = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
	// FETCHING DATA FROM DATABASE 
	$result = $stmt->fetchAll(); 
	// OUTPUT DATA OF EACH ROW 
    if(empty($result)){
        echo "Incorrect username or password!<br>";
    }
    else{
        $_SESSION["user_id"] = $user_id;
        if($user_id == "ADMIN")
          header("Location: ../admin.php");
        else
          header("Location: ../feedback.php");
    }

} catch(PDOException $e) { 
	echo "Error: " . $e->getMessage(); 
} 

// $conn->close(); 

}


?>