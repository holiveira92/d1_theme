<?php
session_start(); 
$location = !empty($_GET['location']) ? $_GET['location'] : "";
$language = !empty($_GET['lang']) ? $_GET['lang'] : "";
$_SESSION['d1_language_option'] = $language;
header("location: " . $location);