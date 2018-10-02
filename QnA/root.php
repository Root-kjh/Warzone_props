<?php
require 'config.php';
if($_SESSION['3id']=="root"){
    if($_SERVER['REMOTE_ADDR']=="222.110.147.53"){
        $result=showQnAAll();
        foreach ($result as $r) {
            echo "<div class='idx'>".$r."</div>";
        }
    }
}else{
    header("Location: index.php");
    die;
}
?>
