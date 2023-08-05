<?php 
session_start();
if (!isset($_SESSION['data'])) {
	header("Location:login");
} 
require 'functions.php';

$id = $_GET["id"];

if (hapusBerita($id) > 0) {
  echo "
    <script>
      window.history.back();
    </script>
    ";
    
}

?>