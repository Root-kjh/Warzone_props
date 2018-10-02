<?php
include 'config.php';
$id=$_POST['id'];
$pw=$_POST['pw'];
if(isset($id,$pw)){
if(SearchDB($id)){
    echo "<script>alert('이미 아이디가 존재합니다!');
    location.href='../signup.php';</script>";
    die;
}
InsertDB($id,$pw);
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