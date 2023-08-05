<?php 
session_start();
if (!isset($_SESSION['data'])) {
	header("Location:login");
} 
require 'functions.php';

$id = $_GET["id"];

if (verifMember($id) > 0) {
  header("Location:member");
  exit;
}
  header("Location:member");


?>