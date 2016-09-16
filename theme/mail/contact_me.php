<?php

if(empty($_POST['name'])    ||
  empty($_POST['email'])    ||
  empty($_POST['subject'])  ||
  empty($_POST['message'])  ||
  !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
  {
    echo "No arguments Provided!";
    return false;
  }

  $name = strip_tags(htmlspecialchars($_POST['name']));
  $email = strip_tags(htmlspecialchars($_POST['email']));
  $subject = strip_tags(htmlspecialchars($_POST['subject']));
  $message = strip_tags(htmlspecialchars($_POST['message']));

  $to = 'sanjayl@outlook.com';
  $email_subject = "Website Contact Form: $name";
  $email_body = "You have received a new message from your website contact.\n\n". "Here is the detail:\n\nName: $name\n\nEmail: $email\n\nSubject: $subject\n\nMessage:\n$message";
  $headers = "From: noreply@sanjaylindsay.me\n";
  $headers .="Reply-To: $email";
  mail($to,$email_subject,$email_body,$headers);
  return true;

/**  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $from = 'From: Sanjay Website';
  $to = 'sanjayl@outlook.com';
  $subject = 'Comment';
  $human = $_POST['human'];

  $body = "From: $name\n E-mail: $email\n Message: \n $message";
  if ($_POST['submit']) {
    if (mail($to, $subject, $body)) {
      echo '<p>Your message has been sent!</p>';
    } else {
      echo '<p>Something went wrong, go back and try again</p>';
    }
  } else if ($_POST['submit'] && $human != '4') {
    echo '<p>You answered the anti-spam question incorrectly!</p>';
  }*/
 ?>
