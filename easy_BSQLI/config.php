<?php
session_start();
$con=mysqli_connect("localhost","prob2","4dminroot!","chall") or die("fail connect");

function login($id,$pw){
    global $con;
    $query="select id from prob2 where id='$id' and pw='$pw'";
    $result=mysqli_query($con,$query);
    $info=mysqli_fetch_assoc($result);
    $_SESSION['bid']=$info['id'];
}

function signup($id,$pw){
    global $con;
    $query="insert into prob2 (id,pw) values('$id','$pw')";
    mysqli_query($con,$query);
}
?>
