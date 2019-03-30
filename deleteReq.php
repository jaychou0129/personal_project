<?php
if(isset($_POST['id'])) {
	try {
	    include 'db.php';
	   	$stmt = $db->prepare("SELECT * FROM `reservations` WHERE `r_id` = ?");
	    $stmt->execute(array($_POST['id']));
	    foreach($stmt as $row) {
	    	$room = $row['room'];
		    $stmt = $db->prepare("DELETE FROM `reservations` WHERE `r_id` = ?");
		    $stmt->execute(array($_POST['id']));
		}

		//update timesReserved of the room.
		$stmt = $db->prepare("SELECT COUNT( * ) as 'total' FROM `reservations` WHERE `room` = ?");
		$stmt->execute(array($room));
		foreach($stmt as $row) { $totalValue = $row['total'];}
		$stmt = $db->prepare("UPDATE `classrooms` SET `timesReserved` = ? WHERE `name` = ?");
		$stmt->execute(array($totalValue, $room));

  	} catch (PDOException $ex) {
    	echo $ex->getMessage();
  	}
}
?>