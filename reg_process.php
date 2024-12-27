<?php require_once('include.php');

if (isset($_REQUEST['action'])) {

	///resendEmailActivation
	if ($_REQUEST['action'] == 'resendEmailActivation') {
		$email = mysqli_real_escape_string($link, $_REQUEST['email']);
		$fullname = $sqli->getRow($email, 'fname') . ' ' . $sqli->getRow($email, 'lname');
		$pass = '';
		$msg = @$email_call->ActivateMail($email, $pass, $fullname);
		echo ($msg);
	}
}

if (isset($_POST['emailfgt'])) {
	$emailfgt = $_POST['emailfgt'];
	if (!empty($emailfgt)) {
		$check = $cal->checkifdataExists($emailfgt, 'email', $user_tb);
		if ($check == 1) {
			print $email_call->forgetpassword($emailfgt, $user_tb, 'email');
		} else {
			print '!Oop email address dose not exist in the systems record!';
		}
	} else {
		print 'Enter a valid email!';
	}
}

if (isset($_POST['cotactmail'])) {
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$country = $_POST['country'];
	$state = $_POST['state'];
	$subject = ucfirst(strtolower($name)) . ' contacted you!';
	$message = $_POST['message'];
	if (!empty($_POST['cotactmail']) && !empty($_POST['message'])) {
		print $email_call->contactUsMail($name, $phone, $email, $subject, $message, $country, $state);
	} else {
		print  'Please fill all fields';
	}
}
