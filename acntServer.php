<?php
if (isset($_POST['mode']) && $_POST['mode'] == 'edit') {
	$id = $_POST['id'];
	$class = $_POST['class'];
	$name = $_POST['name'];
	$pwd = $_POST['pwd'];
	if (!is_numeric($class) && $class != "Tr" && $class != "Admin") echo "Please enter class in the correct format. Examples of acceptable formats:\n\t1001\n\tTr\n\tAdmin";
	else if (strlen($name) > 20) echo "Name must be within 20 characters!";
	else if (strlen($pwd) > 20) echo "Password must be within 20 characters!";
	else {
		try {
	        include 'db.php';
			$stmt = $db->prepare("UPDATE `users` SET `class` = ?, `name` = ?, `pwd` = ? WHERE `ID` = ?");
			$stmt->execute(array($class, $name, $pwd, $id));
		} catch (PDOException $ex) {
			echo "Oops... We've encountered an error!";
		}		
	}

}

if (isset($_POST['mode']) && $_POST['mode'] == 'delete') {
	try {
	    include 'db.php';
	    $stmt = $db->prepare("DELETE FROM `users` WHERE `ID` = ?");
	    $stmt->execute(array($_POST['id']));
  	} catch (PDOException $ex) {
    	echo "Oops... We've encountered an error!";
  	}
}

if (isset($_POST['mode']) && $_POST['mode'] == 'add') {
	$id = $_POST['id'];
	$class = $_POST['class'];
	$name = $_POST['name'];
	$pwd = $_POST['pwd'];
	try {
		include 'db.php';
		$stmt = $db->prepare("SELECT `ID` FROM `users` WHERE `ID` = ?");
		$stmt->execute(array($_POST['id']));
		$row_count = $stmt->rowCount();
		if ($row_count != 0) echo "Username already taken!";
		else if (!is_numeric($class) && $class != "Tr" && $class != "Admin") echo "Please enter class in the correct format. Examples of acceptable formats:\n\t1001\n\tTr\n\tAdmin";
		else if (strlen($name) > 20) echo "Name must be within 20 characters!";
		else if (strlen($pwd) > 20) echo "Password must be within 20 characters!";
		else {
			$stmt = $db->prepare("INSERT INTO `users`(`class`, `name`, `ID`, `pwd`) VALUES (?,?,?,?)");
			$stmt->execute(array($class, $name, $id, $pwd));
		}
	} catch (PDOException $ex) {
		echo "OOps... We've encountered an error!";
	}
}
?>