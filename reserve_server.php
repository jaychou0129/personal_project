<?php

$sentBy = strip_tags($_POST['stuName']);
$room = strip_tags($_POST['room']);
$date = strip_tags($_POST['date']);
$periods = strip_tags($_POST['periods']);
$purpose = strip_tags($_POST['purpose']);
$personnel = isset($_POST['personnel'])? strip_tags($_POST['personnel']) : "";

try {
	include 'db.php';
	$stmt = $db->prepare("INSERT INTO `reservations`(`sentBy`, `room`, `date`, `periods`, `purpose`, `personnel`) VALUES (?,?,?,?,?,?)");
	$stmt->execute(array($sentBy, $room, $date, $periods, $purpose, $personnel));
	header("location: history.php");
} catch (PDOException $ex) {
	echo $ex->getMessage();
}

?>