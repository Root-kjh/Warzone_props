<?php
include "config.php";
$argv=$_GET['argv'];
$root="root";
$query="select * from prob1 where pw='$argv'";
$gazuaaa=mysqli_query($con,$query);
$result=mysqli_fetch_assoc($gazuaaa);
if($result['id']==$root){
    solve();
}
echo "<br><hr>";
highlight_file(__FILE__);
?>
