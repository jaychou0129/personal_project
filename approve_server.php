<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

if(isset($_POST['id']) && isset($_POST['mode'])) {
	try {
		include 'db.php';

		// update status
   		$stmt = $db->prepare("UPDATE `reservations` SET `status`= ?, `message`= ? WHERE `r_id` = ?");
    	$stmt->execute(array($_POST['mode'], $_POST['message'], $_POST['id']));

    	// get reserved room and email address of user
    	$stmt = $db->prepare("SELECT * FROM `reservations` WHERE `r_id` = ?");
    	$stmt->execute(array($_POST['id']));
    	foreach($stmt as $row) {$userEmail = $row['sentBy'].'@ms.mingdao.edu.tw'; $reservedRoom = $row['room'];}

		// send email to user
		try {
		    //Server settings
		    $mail->SMTPDebug = 1;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'mdid.connect@gmail.com';                 // SMTP username
		    $mail->Password = 'asdfghjkl;\'';                           // SMTP password
		    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 587;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom('mdid.connect@gmail.com', 'MDID ConNect System');
		    $mail->addAddress($userEmail);     // Add a recipient

		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    if ($_POST['mode'] == '1') {
		    	$mail->Subject = 'Reservation approved on MDID ConNect System';
		    	$mail->Body    = '
				    <html>
				    <head>
						<meta charset="utf-8">
				    </head>
				    <body>
				    <h3>Reservation approved!</h3>
				    <p>Your reservation for <b>'.$reservedRoom.'</b> has been approved by the admin!</p>
				    <a href="localhost/ConNect/history.php">View Request</a>
				    </body>
				    </html>
				';
				$mail->AltBody = 'Your reservation for '.$reservedRoom.' has been approved by the admin!';
		    }
		    else {
		    	$mail->Subject = 'Reservation declined on MDID ConNect System';
		    	$mail->Body    = '
				    <html>
				    <head>
						<meta charset="utf-8">
				    </head>
				    <body>
				    <h3>Reservation declined!</h3>
				    <p>Your reservation for <b>'.$reservedRoom.'</b> has been declined by the admin!</p>
				    <p>Message:<br>
				    '.nl2br($_POST['message']).'
				    </p>
				    <a href="localhost/ConNect/history.php">View Request</a>
				    </body>
				    </html>
				';
				$mail->AltBody = 'Your reservation for '.$reservedRoom.' has been declined by the admin!';
		    }

		    $mail->send();
		} catch (Exception $e) {
		    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}
  	} catch (PDOException $ex) {
    	echo $ex->getMessage();
  	}
}
?>