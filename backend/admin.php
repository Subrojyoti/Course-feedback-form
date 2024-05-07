<?php
function exists($user_id, $conn){
    $query = "SELECT user_id FROM users WHERE user_id = $user_id;";
    $stmt = $conn->prepare($query); 
      // EXECUTING THE QUERY 
      $stmt->execute(); 
    
  
      $r = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
      // FETCHING DATA FROM DATABASE 
      $result = $stmt->fetchAll();
    if(empty($result))
      return 0;
    else return 1;
  
  }
  function delete_($user_id){
    $servername = "localhost";
  $username = "root";
  $password = "";
  $conn = new PDO("mysql:host=$servername;dbname=assign10_db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (exists($user_id, $conn)) {

            // $query1 = "DELETE FROM feedback WHERE user_id = $user_id;";
            $query2 = "DELETE FROM users WHERE user_id = $user_id;";

            // $conn->exec($query1);
            $conn->exec($query2);
            echo "Record successfully deleted<br>";
        } else {
            echo "USER ID does not exist<br>";
            header("Location: ./delete_record.php");
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
  }
$user_id = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["delete_record"];
    delete_($user_id);
    header("Location: backend/.php");
  }

?>