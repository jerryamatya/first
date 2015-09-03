<?php

if(isset($_POST['email'])) {

	

	// EDIT THE 2 LINES BELOW AS REQUIRED

	$email_to = "lost1734@hotmail.com";

	$email_subject = "Your email subject line";

	

	

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

		!isset($_POST['Street']) ||
		
		!isset($_POST['City']) ||
		
		!isset($_POST['State']) ||
		
		!isset($_POST['ZipCode']) ||
		
		!isset($_POST['telephone']) ||

		!isset($_POST['ItemDonate'])) {

		died('We are sorry, but there appears to be a problem with the form you submitted.');		

	}

	

	$first_name = $_POST['first_name']; // required

	$last_name = $_POST['last_name']; // required

	$email_from = $_POST['email']; // required

	$telephone = $_POST['telephone']; // not required

	$street_from = $_POST['Street']; // required
	$city_from = $_POST['City']; // required
	$state_from = $_POST['State']; // required
		$zipCode_from = $_POST['ZipCode']; // required
	
	$ItemDonate_from = $_POST['ItemDonate']; // required
	
	

	

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

  if(strlen($ItemDonate_from) < 2) {

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

	

	$email_message .= "First Name: ".clean_string($first_name)."\n";

	$email_message .= "Last Name: ".clean_string($last_name)."\n";

	$email_message .= "Email: ".clean_string($email_from)."\n";

	$email_message .= "Telephone: ".clean_string($telephone)."\n";

	$email_message .= "ItemDonate: ".clean_string($ItemDonate_from)."\n";
	
	$email_message .= "Street: ".clean_string($street_from)."\n";
	
	$email_message .= "City: ".clean_string($city_from)."\n";
	
	$email_message .= "State: ".clean_string($state_from)."\n";

	$email_message .= "zip Code: ".clean_string($zipCode_from)."\n";

	

// create email headers

$headers = 'From: '.$email_from."\r\n".

'Reply-To: '.$email_from."\r\n" .

'X-Mailer: PHP/' . phpversion();

@mail($email_to, $email_subject, $email_message, $headers);  

?>



<!-- include your own success html here -->

<script>
alert("Thank you for Your Support. We will be in touch with you very soon.");
window.location.href = "http://localhost:1234/stylish-portfolio/index.html";
</script>




<?php

}

?>
