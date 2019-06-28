<?php

if (isset($_POST["logout"])) {
	session_start();
	session_destroy();
	session_unset();

	header("Location: login.php?logged_out_successfully");
	exit();
}

?>