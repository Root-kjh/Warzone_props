<?php
session_start();
$con=mysqli_connect("localhost","prob7","4dminroot!","chall") or die("fail connect DB");
function InsertDB($id,$pw,$sid){
    global $con;
    $id=addslashes($id);
    $pw=hash('sha512',$pw);
    $sid=addslashes($sid);
    $query="insert into prob7_user(id,pw,sid) values('$id','$pw','$sid')";
    mysqli_query($con,$query) or die("error query");
}

function SearchDB($id,$sid){
    global $con;
    $id=addslashes($id);
    $sid=addslashes($sid);
    $query="select id from prob7_user where id='$id' and sid='$sid'";
    $info=mysqli_query($con,$query) or die("error query");
    $result=mysqli_fetch_row($info);
    foreach($result as $row){
        if(addslashes($row)==$id){
            return true;
        }
    }
    return false;
}

function SelectDB($id,$pw,$sid){
    global $con;
    $id=addslashes($id);
    $pw=hash('sha512',$pw);
    $sid=addslashes($sid);
    $query="select id from prob7_user where id='$id' and pw='$pw' and sid='$sid'";
    $info=mysqli_query($con,$query) or die("error query");
    while($row=mysqli_fetch_row($info)){
        if(addslashes($row[0])==$id){
            $_SESSION['prob7_id']=stripslashes($id);
            return true;
        }
    }
    return false;
}

function Memos($id,$sid){
    global $con;
    $id=addslashes($id);
    $sid=addslashes($sid);
    $query="select idx,memo from prob7_memo where id='$id' and sid='$sid'";
    $info=mysqli_query($con,$query) or die("error query");
    $i=0;
    while ($row=mysqli_fetch_row($info)) {
        $return[$i][0]=$row[0];
        $return[$i][1]=$row[1];
        $i++;
    }
    return $return;
}

function InsertMemo($id,$sid,$memo){
    global $con;
    $id=addslashes($id);
    $sid=addslashes($sid);
    $memo=addslashes($memo);
    $query="insert into prob7_memo (id,sid,memo) values('$id','$sid','$memo')";
    mysqli_query($con,$query) or die("error query");
}

function EditMemo($idx,$memo,$id,$sid){
    global $con;
    $id=addslashes($id);
    $sid=addslashes($sid);
    $idx=addslashes($idx);
    $memo=addslashes($memo);
    $query="update prob7_memo set memo='$memo' where id='$id' and sid='$sid' and idx='$idx'";
    mysqli_query($con,$query) or die("error query");
}

function DeleteMemo($idx,$id,$sid){
    global $con;
    $id=addslashes($id);
    $sid=addslashes($sid);

    $query="delete from prob7_memo where id='$id' and sid='$sid' and idx='$idx'";
    mysqli_query($con,$query) or die("error query");   
}
?>