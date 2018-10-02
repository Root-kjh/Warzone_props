<?php
include 'config.php';
$upload_dir="../uploads/";
$DBupload_dir="./uploads/";
$allowed_ext=array('aiff','3gp','awb','mp3','ogg','wav','wma','wave');

$title=$_POST['title'];
$error=$_FILES['audio']['error'];
$name=$_FILES['audio']['name'];
$ext=array_pop(explode('.',$name));

if($error!=UPLOAD_ERR_OK){
    switch($error){
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            echo "<script>alert('파일이 너무 큽니다.');location.href='../my.php';</script>";
            break;
        case UPLOAD_ERR_NO_FILE:
            echo "<script>alert('파일이 첨부되지 않았습니다.');location.href='../my.php';</script>";
            break;
        default:
            echo "<script>alert('파일이 제대로 업로드되지 않았습니다.');location.href='../my.php';</script>";
    }
    exit;
}

$flag=TRUE;
foreach($allowed_ext as $a){
    if($a==$ext){
        $flag=FALSE;
        $real_ext=$a;
        break;
    }
}
if($flag){
    echo "<script>alert('오디오 파일만 가능합니다!');location.href='../my.php';</script>";
    exit;
}

$count=upload($_SESSION['prob9_id'],$DBupload_dir,$real_ext,$title);
$real_dir=$upload_dir.$count.".".$real_ext;
move_uploaded_file($_FILES['audio']['tmp_name'],$real_dir);
echo "<script>location.href='../my.php';</script>";
?>