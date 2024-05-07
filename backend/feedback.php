<?php
require "connect.php";
require "resourses.php";
// echo $_SESSION["user_id"];
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $user_id = $_SESSION["user_id"];
    $feed = $_POST["msg"];
    $satisfied = $_POST["satisfy"];
    try{
        $query = "INSERT INTO feedback (feed_id, user_id, feed, satisfied) VALUES ('$user_id', '$user_id', '$feed', '$satisfied');";
        $conn->exec($query);
    }
    catch(PDOException& e){
        echo "Error: " . $e->getMessage();
    }
}


?>