<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Frontend with Buttons</title>
</head>
<body>
  <!-- <button  style="display: block; width: 200px; padding: 15px; margin: 20px auto; font-size: 20px;">Delete Record</button> -->
    <form action="delete_record.html" method="post">
        <input type="submit" value ="Delete Record" name = "delete_record"  style="display: block; width: 200px; padding: 15px; margin: 20px auto; font-size: 20px;">
    </form>
  
    <form action="backend/resourses.php" method="post">
        <input type="submit" value="logout" name="logout" style="display: block; width: 150px; padding: 10px; margin: 20px auto; font-size: 16px;">
    </form>
</body>
</html>
