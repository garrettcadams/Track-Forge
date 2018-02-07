<?php
session_start();
include("../includes/config.php");
if($_POST['token_id'] != $_SESSION['token_id']) {
	return false;
}
include("../includes/classes.php");
include(getLanguage(null, (!empty($_GET['lang']) ? $_GET['lang'] : $_COOKIE['lang']), 2));
$db = new mysqli($CONF['host'], $CONF['user'], $CONF['pass'], $CONF['name']);
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}
$db->set_charset("utf8");

$resultSettings = $db->query(getSettings());
$settings = $resultSettings->fetch_assoc();

// Attempt to set a custom default timezone
if($settings['time'] == 0) {
	date_default_timezone_set($settings['timezone']);
}

if(isset($_SESSION['usernameAdmin']) && isset($_SESSION['passwordAdmin'])) {
	$loggedInAdmin = new loggedInAdmin();
	$loggedInAdmin->db = $db;
	$loggedInAdmin->url = $CONF['url'];
	$loggedInAdmin->username = $_SESSION['usernameAdmin'];
	$loggedInAdmin->password = $_SESSION['passwordAdmin'];
	$loggedIn = $loggedInAdmin->verify();

	if($loggedIn['username']) {
		$managePayments = new managePayments();
		$managePayments->db = $db;
		$managePayments->url = $CONF['url'];
		$managePayments->per_page = $settings['rperpage'];
		
		if(isset($_POST['start'])) {
			echo $managePayments->getPayments($_POST['start']);
		}
	}
}
mysqli_close($db);
?>