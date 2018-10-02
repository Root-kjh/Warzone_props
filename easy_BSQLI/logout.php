<?php
session_start();
unset($_SESSION['bid']);
header("Location: /easy_BSQLI")
?>