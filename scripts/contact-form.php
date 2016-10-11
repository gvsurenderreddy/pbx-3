<?php
if(isset($_POST['email'])) {

  $email_to  = 'ficture@gmail.com' . ', ';
  $email_to .= 'oversun@gmail.com';
  $email_subject = "Contact request";

    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }

    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['phone']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $phone = $_POST['phone']; // not required
    $message = $_POST['message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }

  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }

  if(strlen($message) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }

    $email_message = "Form details below.\n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    //$email_message .= "First Name: ".clean_string($first_name)."\n";
    //$email_message .= "Last Name: ".clean_string($last_name)."\n";
    //$email_message .= "Email: ".clean_string($email_from)."\n";
    //$email_message .= "Phone: ".clean_string($phone)."\n";
    //$email_message .= "Comments: ".clean_string($message)."\n";

// message
$email_message = '
<html>
<head>
  <title>PBX Contact form</title>
</head>
<body>
  <h3>PBX Contact form info request</h3>
  <p>'.'First Name: '.clean_string($first_name). '</p>
  <p>'.'Last Name: '.clean_string($last_name). '</p>
  <p>'.'Email: '.clean_string($email_from). '</p>
  <p>'.'Phone: '.clean_string($phone). '</p>
  <p>'.'Message: '.clean_string($message). '</p>
  </body>
</html>
';

// create email headers
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: '.$email_from."\r\n";
$headers .= 'From: '.$email_from."\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();

// Mail it
//mail($to, $subject, $message, $headers);
if(mail($email_to, $email_subject, $email_message, $headers)){
        header("Location: success-message.html");
    } else {
        died($error_message);
    }
//@mail($email_to, $email_subject, $email_message, $headers);
?>
<!-- include your own success html here -->

Thank you for contacting us. We will be in touch with you very soon.

<?php
}

?>