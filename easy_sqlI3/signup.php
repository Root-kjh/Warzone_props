<?php
include 'config.php';
$id=$_POST['id'];
$pw=$_POST['pw'];
$pwr=$_POST['pwr'];
$id=addslashes($id);
$pw=addslashes($pw);
$pwr=addslashes($pwr);
if($pw!=$pwr || !isset($_POST['id'],$_POST['pw'],$_POST['pwr'])){
    echo "<script>alert('입력값이 올바르지 않습니다.');
            location.href='/easy_sqlI3';</script>";
    die;
    
}else{
    signup($id,$pw);
    echo "<script>alert('회원가입 성공.');
    location.href='/easy_sqlI3';</script>";
}
?>