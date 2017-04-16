<?php
	if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$to = 'sanjayl@outlook.com';
		$subject = 'New Contact';
		$body = '<html>
					<body>
						<h2> Feedback- '.$email.'</h2>
						<hr>
						<p>Name: <br>'.$name.'</p>
						<p>Email: <br>'.$email.'</p>
						<p>Message: <br>'.$message.'</p>
					</body>
				</html>';

		//headers
		$headers = "From: ".$name." <".$email.">\r\n";
		$headers .= "Reply-To: ".$email."\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; character-utf-8";

		//send
		$send = mail($to, $subject, $body, $headers);
		if ($send) {
			echo '<br>';
			echo 'Thank you for contacting me. I will get back to you as soon as possible';
		} else {
			echo 'error';
		}
}
?>
