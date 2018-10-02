<?php
session_start();
$con=mysqli_connect("localhost","prob8","4dminroot!","chall") or die("fail connect");

function login($id,$pw){
    global $con;
    $query="select id from prob8_user where id='$id' and pw=md5('$pw')";
    $result=mysqli_query($con,$query) or die ("fail");
    $info=mysqli_fetch_assoc($result);
    $_SESSION['prob8_id']=$info['id'];
}

function signup($id,$pw){
    global $con;
    $query="insert into prob8_user (id,pw) values('$id',md5('$pw'))";
    mysqli_query($con,$query);
}
?>
