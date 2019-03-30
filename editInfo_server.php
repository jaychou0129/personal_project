<?php

  	if ($_FILES['disFile']['tmp_name'] != "") {
	  $target = "img/img_".$_POST['id'].".jpg";
	  move_uploaded_file($_FILES['disFile']['tmp_name'], $target);
	}
  	if ($_FILES['schFile']['tmp_name'] != "") {
	  $target = "img/sch_".$_POST['id'].".jpg";
	  move_uploaded_file($_FILES['schFile']['tmp_name'], $target);
	}

	try {
        include 'db.php';
		$stmt = $db->prepare("UPDATE `classrooms` SET `name` = ?, `description` = ? WHERE `id` = ?");
		$stmt->execute(array($_POST['room_name'], $_POST['room_floor'], $_POST['id']));
	} catch (PDOException $ex) {
		echo $ex->getMessage();
	}

?>