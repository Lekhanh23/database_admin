<?php
session_start();
session_destroy();
header("Location: login.php"); // hoặc trang chính
exit();
?>