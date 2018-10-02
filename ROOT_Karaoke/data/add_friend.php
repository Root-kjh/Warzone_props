<?php
include 'config.php';
if(isset($_POST['fid'])){
    $fid=$_POST['fid'];
    if(add_friend($fid,$_SESSION['prob9_id'])){
        echo "<script>alert('$fid 님이 친구로 추가되었습니다.');</script>";
    }else{
        echo "<script>alert('아이디를 찾을 수 없습니다.');</script>";
    }
}
echo "<script>location.href='../friend.php';</script>";
?>