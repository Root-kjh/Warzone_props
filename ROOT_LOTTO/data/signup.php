<?php
include 'config.php';
$id=$_POST['id'];
$pw=$_POST['pw'];
$sid=$_SESSION['id'];
if(isset($id,$pw,$sid)){
if(SearchDB($id,$sid)){
    echo "<script>alert('이미 아이디가 존재합니다!');
    location.href='../signup.php';</script>";
    die;
}
InsertDB($id,$pw,$sid);
}
else{
    echo "<script>alert('입력이 부적절합니다.');
    location.href='../signup.php';</script>";
}
?>
<script>
alert("회원가입 완료!");
location.href="../index.php";
</script>