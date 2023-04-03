

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
		$body = "Hi $name, this e-mail is to confirm that $movie is booked to Dublin 23/03/2023 at 19:00, <br> Enjoy your movie.";
		$headers = "From: LucasFilm";
		
		if (mail($to_email, $subject, $body, $headers)){
			echo nl2br('<script>alert("Email sucessfully sent.")</script>');
			echo nl2br("<p style='font-size:2vw;'>Returning to main page in 2 seconds.</p>");
			$url1=$_SERVER['REQUEST_URI'];
    		header("Refresh: 3; URL=http://localhost/Movies/index.php");
			} else {
			echo "Email sending failed";
		}
	}
		
	echo '<body style="background: url("../images/hero-bg.jpg") no-repeat;">';

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
			// echo nl2br("<p style='font-size:2vw;'>New record created successfully</p>");
		}else {
			echo "Error: " . $sql . "<br>" . $conn->error; 
		}
		
		echo nl2br("<p style='font-size:2vw;'>Movie stored $movie . \nData stored to the database.</p>"); 
		header("refresh:5;url=listing.html?myMovie=000");

		$conn->close();
	}
?>

