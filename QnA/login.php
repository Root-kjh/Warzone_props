<?php
require 'config.php';
$id=$_POST['id'];
$pw=$_POST['pw'];
login($id,$pw);
if(isset($_SESSION['3id'])){
    echo "<script>
        alert('로그인 성공!');
        location.href='index.php'
        </script>";
    die;
}else{
    echo "<script>
        alert('로그인 실패... ㅠㅠ');
        location.href='index.php'
        </script>";
    die;
}
?>