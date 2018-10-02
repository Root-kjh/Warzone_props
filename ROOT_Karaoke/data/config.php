<?php
session_start();
$con=mysqli_connect("localhost","prob9","4dminroot!","chall") or die("fail connect DB");
function InsertDB($id,$pw){
    global $con;
    $id=addslashes($id);
    $pw=hash('sha512',$pw);
    $query="insert into prob9_user(id,pw) values('$id','$pw')";
    mysqli_query($con,$query) or die("error query");
}

function SearchDB($id){
    global $con;
    $id=addslashes($id);
    $query="select id from prob9_user where id='$id'";
    $info=mysqli_query($con,$query) or die("error query");
    $result=mysqli_fetch_row($info);
    foreach($result as $row){
        if(addslashes($row)==$id){
            return true;
        }
    }
    return false;
}

function SelectDB($id,$pw){
    global $con;
    $id=addslashes($id);
    $pw=hash('sha512',$pw);
    $query="select id from prob9_user where id='$id' and pw='$pw'";
    $info=mysqli_query($con,$query) or die("error query");
    while($row=mysqli_fetch_row($info)){
        if(addslashes($row[0])==$id){
            $_SESSION['prob9_id']=stripslashes($id);
            if($_SESSION['prob9_id']=="root")
                setcookie("FLAG","FLAG{C00k13s_4r5_D51ici0Us}",time()+300,'/');
            
            return true;
        }
    }
    return false;
}

function my($id){
    global $con;
    $i=0;
    $id=addslashes($id);
    $query="select dir,ext,title,idx from prob9_karaoke where id='$id'";
    $info=mysqli_query($con,$query) or die ("error query");
    while($row=mysqli_fetch_row($info)){
        $result[$i][0]=$row[0];
        $result[$i][1]=$row[1];
        $result[$i][2]=$row[2];
        $result[$i][3]=$row[3];
        $i++;
    }
    return $result;
}

function upload($id,$dir,$ext,$title){
    global $con;
    $id=addslashes($id);
    $title=addslashes($title);
    $query="select count(*)+1 from prob9_karaoke";
    $info=mysqli_query($con,$query) or die ("error count query");
    while ($row=mysqli_fetch_row($info)) {
        $count=$row[0];
    }
    $real_dir=$dir.$count.".".$ext;
    $query="insert into prob9_karaoke(id,dir,ext,title) values('$id','$real_dir','$ext','$title')";
    mysqli_query($con,$query) or die ("error query");
    return $count;
}

function search_friends($id){
    global $con;
    $id=addslashes($id);
    $query="select dir,ext,title from prob9_karaoke,prob9_friend where prob9_karaoke.id=prob9_friend.friend and prob9_friend.id='$id' and is_view=0 limit 1";
    $info=mysqli_query($con,$query) or die ("error select friend");
    while ($row=mysqli_fetch_row($info)) {
        $result[0]=$row[0];
        $result[1]=$row[1];
        $result[2]=$row[2];
    }
    $dir=$result[0];
    $query="update prob9_karaoke set is_view=1 where dir='$dir'";
    mysqli_query($con,$query);
    return $result;
}

function add_friend($fid,$id){
    global $con;
    $id=addslashes($id);
    $fid=addslashes($fid);
    $query="select count(*) from prob9_user where id='$fid'";
    $info=mysqli_query($con,$query) or die ("error search friend");
    $result=mysqli_fetch_row($info);
    if($result[0]<=0)
        return false;
    else{
    $query="insert into prob9_friend(id,friend) values('$id','$fid')";
    mysqli_query($con,$query) or die("<script>alert('이미 추가된 친구입니다!');location.href='../friend.php';</script>");
    
    $query="insert into prob9_friend(id,friend) values('$fid','$id')";
    mysqli_query($con,$query) or die("<script>alert('이미 추가된 친구입니다!');location.href='../friend.php';</script>");
    return true;
    }
}

function Deletemy($id,$idx){
    global $con;
    $id=addslashes($id);
    $idx=addslashes($idx);
    $query="select dir from prob9_karaoke where id='$id' and idx='$idx'";
    $info=mysqli_query($con,$query);
    while ($row=mysqli_fetch_row($info)) {
        $dir=$row[0];
    }
    unlink(".".$dir);
    $query="delete from prob9_karaoke where id='$id' and idx='$idx'";
    mysqli_query($con,$query);
}

function Editmy($id,$title,$idx){
    global $con;
    $id=addslashes($id);
    $idx=addslashes($idx);
    $title=addslashes($title);
    $query="update prob9_karaoke set title='$title' where id='$id' and idx='$idx'";
    mysqli_query($con,$query);
}
?>  