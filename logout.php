<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$_SESSION["user"] = null;
	header("Location: login.html");
}
