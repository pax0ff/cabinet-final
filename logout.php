<?php
require("utils/Session.php");
unset($_SESSION['loggedin']);
unset($_SESSION['id']);
unset($_SESSION['username']);
header("location: home?logout=1");
?>