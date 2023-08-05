<?php 

session_start();
if (!isset($_SESSION['data'])) {
  header('Location:login');
}

$_SESSION = [];
session_unset();
session_destroy();

header('Location: login?logout=1');
exit;

?>