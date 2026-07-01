<?php
session_start();
session_destroy();
header("Location: /novusblog/index.php");
exit();
?>