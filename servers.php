<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

//Server settings
$mail->SMTPDebug = 1;                                 // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mdid.connect@gmail.com';                 // SMTP username
$mail->Password = 'asdfghjkl;\'';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

include 'db.php';

if (isset($_POST['request']) && $_POST['request'] == 'index') {
	try {
	    //Recipients
	    $mail->setFrom('mdid.connect@gmail.com', 'MDID ConNect System');
	    $mail->addAddress('jay920129@gmail.com');     // Add a recipient
	    $mail->addReplyTo('jay920129@gmail.com', 'MDID ConNect System');

	    //Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = 'Feedback for MDID ConNect System';
	    $mail->Body    = '
		    <html>
		    <head>
				<meta charset="utf-8">
		    </head>
		    <body>
		    	<h3>You have received 1 suggestion from an anonymous user of the MDID ConNect System.</h3>
			    <p>Message:<br>
			    	'.nl2br($_POST['message']).'
			    </p>
			    <a href="localhost/ConNect/index.php">View Website</a>
		    </body>
		    </html>
	    ';
	    $mail->AltBody = nl2br($_POST['message']);
	    $mail->send();
	} catch (Exception $e) {}
}

if (isset($_POST['request']) && $_POST['request'] == 'reserve') {
	$sentBy = strip_tags($_POST['stuName']);
	$room = strip_tags($_POST['room']);
	$date = strip_tags($_POST['date']);
	$periods = strip_tags($_POST['periods']);
	$purpose = strip_tags($_POST['purpose']);
	$personnel = isset($_POST['personnel'])? strip_tags($_POST['personnel']) : "";

	try {
		$stmt = $db->prepare("INSERT INTO `reservations`(`sentBy`, `room`, `date`, `periods`, `purpose`, `personnel`) VALUES (?,?,?,?,?,?)");
		$stmt->execute(array($sentBy, $room, $date, $periods, $purpose, $personnel));

		//update timesReserved of the room.
		$stmt = $db->prepare("SELECT COUNT( * ) as 'total' FROM `reservations` WHERE `room` = ?");
		$stmt->execute(array($room));
		foreach($stmt as $row) { $totalValue = $row['total'];}
		$stmt = $db->prepare("UPDATE `classrooms` SET `timesReserved` = ? WHERE `name` = ?");
		$stmt->execute(array($totalValue, $room));


		// send email to admin
		try {
		    //Recipients
		    $mail->setFrom('mdid.connect@gmail.com', 'MDID ConNect System');
		    $mail->addAddress('jay920129@gmail.com');     // Add a recipient

		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'New Reservation on MDID ConNect System';
		    $mail->Body    = '
			    <html>
			    <head>
					<meta charset="utf-8">
			    </head>
			    <body>
				    <h3>New Reservation!</h3>
				    <p>'.$_POST['fullName'].' made a new reservation for <b>'.$room.'</b>. <br>
				    	Date: <b>'.$date.'</b><br>
				    	Periods: <b>'.$periods.'</b>
				    </p>
				    <a href="localhost/ConNect/approve.php">View Request</a>
			    </body>
			    </html>
		    ';
		    $mail->AltBody = 'There is a new reservation for '.$room.' on '.$date.' '.$periods.' made by '.$_POST['fullName'].'!';
		    $mail->send();
		} catch (Exception $e) { }
		header("location: history.php");
	} catch (PDOException $ex) {
		echo "Error!";
	}
}
?>