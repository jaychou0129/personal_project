<?php
$dsn = "mysql:host=localhost;dbname=conNect; charset:utf16_unicode_ci";
$username = "root";
$password = "";

try {
	$db = new PDO($dsn, $username, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch(PDOException $e) {
	$error_message = $e->getMessage();
	echo $error_message;
	exit();
}
?>