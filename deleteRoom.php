<?php
if(isset($_POST['id'])) {
	try {
	    include 'db.php';
	    $stmt = $db->prepare("DELETE FROM `classrooms` WHERE `id` = ?");
	    $stmt->execute(array($_POST['id']));
  	} catch (PDOException $ex) {
    	echo $ex->getMessage();
  	}
}
?>