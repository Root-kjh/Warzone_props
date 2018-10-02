<?php
ini_set('pcre.backtrack_limit', '200000');
require 'config.php';
if(!isset($_SESSION['3id'])){
    echo "<script>
            alert('로그인이 필요합니다!');
            location.href='index.php';
            </script>";
    die;
}
$title=$_POST['title'];
$content=$_POST['content'];
write($_SESSION['3id'],$title,$content);
header("Location: QnA.php");
    die;
?>