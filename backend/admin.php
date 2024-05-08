<?php
function exists($user_id, $conn){
    $query = "SELECT user_id FROM users WHERE user_id = :user_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $result = $stmt->fetchAll();
    if(empty($result))
        return false;
    else 
        return true;
}

function delete_($user_id){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "assign10_db";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (exists($user_id, $conn)) {
            $query1 = "DELETE FROM feedback WHERE user_id = :user_id";
            $query2 = "DELETE FROM users WHERE user_id = :user_id";

            $stmt1 = $conn->prepare($query1);
            $stmt1->bindParam(':user_id', $user_id);
            $stmt1->execute();

            $stmt2 = $conn->prepare($query2);
            $stmt2->bindParam(':user_id', $user_id);
            $stmt2->execute();

            echo "Record successfully deleted<br>";
        } else {
            echo "USER ID does not exist<br>";
            header("Location: ../delete_record.php");
            exit; // Exit to prevent further execution
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

$user_id = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["delete_record"];
    delete_($user_id);
    header("Location: ../admin.php");
    exit; // Exit to prevent further execution
}
?>
