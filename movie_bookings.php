<?php
	$errors='';

	// variables
	$movie = $_COOKIE['movie'];
	$bookingtime = $_POST['bookingtime'];
	$email = $_POST['email'];
	$name = $_POST['name'];
	$spam = $_POST['username']; //Bot trap
	
	if ($spam) {
		die("No spamming allowed!");
	} else {
		//sending email
		$to_email = $email;
		$subject = "Confirmed booking to $movie";
		$body = "Hi $name This is to confirme $movie is booked at $bookingtime";
		$headers = "From: movie magic";
		
		if (mail($to_email, $subject, $body, $headers)){
			echo nl2br("<p style='font-size:2vw;'>Email sucessfully sent to $to_email</p>");
		} else {
			echo "Email sending failed";
		}
	}
		
	echo '<body style="background-color:#e0e0e0;">';

	if(empty($errors)){

		// variables
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "web";

		// creating connection
		$conn = new mysqli($servername,$username,$password,$dbname);

		if($conn->connect_error){
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "INSERT INTO movie_bookings (name, movie, datetime, email)
		VALUES ('$name', '$movie', '$bookingtime', '$email')";
		
		if($conn->query($sql) === TRUE){
			echo nl2br("<p style='font-size:2vw;'>New record created successfully</p>");
		}else {
			echo "Error: " . $sql . "<br>" . $conn->error; 
		}
		
		echo nl2br("<p style='font-size:2vw;'>Movie stored $movie . \nData stored to the database.</p>"); 
		header("refresh:5;url=listing.html?myMovie=000");

		$conn->close();
	}
?>