<?php
if(isset($_POST['id'])) {
	try {
	    include 'db.php';
	   	$stmt = $db->prepare("SELECT * FROM `reservations` WHERE `r_id` = ?");
	    $stmt->execute(array($_POST['id']));
	    foreach($stmt as $row) {
		    $stmt = $db->prepare("DELETE FROM `reservations` WHERE `r_id` = ?");
		    $stmt->execute(array($_POST['id']));
		}
  	} catch (PDOException $ex) {
    	echo $ex->getMessage();
  	}
}
?>