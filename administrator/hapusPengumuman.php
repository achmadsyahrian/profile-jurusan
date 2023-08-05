<?php 
session_start();
if (!isset($_SESSION['data'])) {
	header("Location:login");
} 
require 'functions.php';

$id = $_GET["id"];

if (hapusPengumuman($id) > 0) {
  echo "
    <script>
      window.history.back();
    </script>
    ";
    
}

?>