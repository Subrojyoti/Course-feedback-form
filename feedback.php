<?php
session_start();
?>

<!DOCTYPE html> 
<html lang="en"> 

<head> 
	<meta charset="UTF-8"> 
	<meta name="viewport"
		content="width=device-width,initial-scale=1.0"> 
	<title>Responsive Form Card</title> 
	<link rel="stylesheet" href= 
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"> 
	<link rel="stylesheet" href="css/style.css"> 
</head> 

<body> 
    <form action="backend/resourses.php" method="post">
        <input type="submit" value="logout" name="logout">
    </form>
	<h1>Feedback Form</h1> 

<?php
	echo "User: ".$_SESSION['user_id'];
?>

<div class="form-box"> 
		<div class="textup"> 
			<i class="fa fa-solid fa-clock"></i> 
			It only takes two minutes!! 
		</div> 
		<form action="backend/feedback.php" method="post"> 

			<label> 
				<i class="fa-solid fa-face-smile"></i> 
				Are you satisfied with our teachings? 
			</label> 
			<div class="radio-group"> 
				<input type="radio" id="yes"
					name="satisfy" value="yes" checked> 
				<label for="yes">Yes</label> 

				<input type="radio" id="no"
					name="satisfy" value="no"> 
				<label for="no">No</label> 
			</div> 

			<label for="msg"> 
				<i class="fa-solid fa-comments"
				style="margin-right: 3px;"></i> 
				Write your Feedback: 
			</label> 
			<textarea id="msg" name="msg"
					rows="4" cols="10" required> 
			</textarea> 
			<button type="submit"> 
				Submit 
			</button> 
		</form> 
	</div> 
</body> 

</html>
