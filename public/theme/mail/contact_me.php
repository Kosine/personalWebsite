<?php
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $from = 'From: Sanjay Website';
  $to = 'sanjayl@outlook.com';
  $subject = 'Comment';
  $human = $_POST['human'];

  $body = "From: $name\n E-mail: $email\n Message: \n $message";
  if ($human && $human == '4') {
    if(mail($to, $subject, $body)) {
      echo '<p>Your message has been sent!</p>';
    } else {
      echo '<p>Something went wrong, go back and try again</p>';
    }
  } else if (!$human || $human != '4') {
    echo '<p>You answered the anti-spam question incorrectly!</p>';
  }
 ?>
