<?php
session_start();

if (!isset($_SESSION["USERNAME"])) {
	header("Location: logout.php");
	exit;
}

print "Welcome, $_SESSION[USERNAME]";
print "<li><a href=\"logout.php\">logout</a></li>";
