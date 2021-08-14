<?php
session_start();
unset($_SESSION['P09']);
session_destroy();
header("Location: ./index.php");
?>