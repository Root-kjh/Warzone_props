<?php
include 'config.php';
$argv=$_GET['argv'];
if(preg_match('/ /',$_GET['argv'])) die ("No Hack ^^");
$query="select * from prob5 where pw='$argv'";
$gazuaaa=mysqli_query($con,$query);
$result=mysqli_fetch_assoc($gazuaaa);
foreach($result as $row)
print_r($row);
echo "<hr>";
highlight_file(__FILE__);