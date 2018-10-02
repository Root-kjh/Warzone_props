<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'config.php';
$id=$_POST['id'];
$pw=$_POST['pw'];
if(matchId($id)){
    echo "<script>
            alert('같은 id가 존재합니다!');
            location.href='signup.html';
            </script>";
    die;
}
signup($id,$pw);
echo "<script>
        alert('회원가입 성공');
        location.href='index.php';
        </script>";

?>