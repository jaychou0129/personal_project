<?php
if(isset($_POST['room_name']) && isset($_POST['room_floor'])) {
	try {
	    include 'db.php';
	    $stmt = $db->prepare("INSERT INTO `classrooms`(`name`, `description`) VALUES (?, ?)");
	    $stmt->execute(array($_POST['room_name'], $_POST['room_floor']));

	    $stmt = $db->prepare("SELECT `id` FROM `classrooms` ORDER BY `id` DESC LIMIT 1");
	    $stmt->execute();
	    foreach($stmt as $row) { $id = $row['id'];}
  	} catch (PDOException $ex) {
    	echo $ex->getMessage();
  	}
} else {
	echo "error";
}

if ($_FILES['disFile']['tmp_name'] != "") {
  $target = "img/img_".$id.".jpg";
  move_uploaded_file($_FILES['disFile']['tmp_name'], $target);
}
	if ($_FILES['schFile']['tmp_name'] != "") {
  $target = "img/sch_".$id.".jpg";
  move_uploaded_file($_FILES['schFile']['tmp_name'], $target);
}

?>