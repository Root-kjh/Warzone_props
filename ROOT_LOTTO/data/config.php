<?php
session_start();
$con=mysqli_connect("localhost","prob6","4dminroot!","chall") or die("fail connect DB");
function InsertDB($id,$pw,$sid){
    global $con;
    $id=addslashes($id);
    $pw=hash('sha512',$pw);
    $sid=addslashes($sid);
    $query="insert into prob6_user(id,pw,sid) values('$id','$pw','$sid')";
    mysqli_query($con,$query) or die("error query");
    $query="insert into prob6_lotto (id,sid,one,two,three,four,five,six)
    values('$id','$sid',FLOOR(1+RAND()*(64-1)),FLOOR(1+RAND()*(64-1)),FLOOR(1+RAND()*(64-1)),FLOOR(1+RAND()*(64-1)),FLOOR(1+RAND()*(64-1)),FLOOR(1+RAND()*(64-1)))";
    mysqli_query($con,$query);
}

function SearchDB($id,$sid){
    global $con;
    $id=addslashes($id);
    $sid=addslashes($sid);
    $query="select id from prob6_user where id='$id' and sid='$sid'";
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
    $query="select id,point from prob6_user where id='$id' and pw='$pw' and sid='$sid'";
    $info=mysqli_query($con,$query) or die("error query");
    while($row=mysqli_fetch_row($info)){
        if(addslashes($row[0])==$id){
            $query="update prob6_lotto set
            one=FLOOR(1+RAND()*(64-1)),
            two=FLOOR(1+RAND()*(64-1)),
            three=FLOOR(1+RAND()*(64-1)),
            four=FLOOR(1+RAND()*(64-1)),
            five=FLOOR(1+RAND()*(64-1)),
            six=FLOOR(1+RAND()*(64-1)))
            where id='$id' and sid='$sid'";
            mysqli_query($con,$query);
            $_SESSION['prob6_id']=stripslashes($id);
            $_SESSION['prob6_point']=$row[1];
            return true;
        }
    }
    return false;
}

function Lotto($id,$sid,$lotto){
    global $con;
    for($i=0;$i<count($lotto);$i++){
        $lotto[$i]=addslashes($lotto[$i]);
    }
    $query="update prob6_user set point=point-100 where sid='$sid' and id='$id'";
    mysqli_query($con,$query) or die("fail query");
    $one=$lotto[0];
    $two=$lotto[1];
    $three=$lotto[2];
    $four=$lotto[3];
    $five=$lotto[4];
    $six=$lotto[5];
    $query="select id,sid,one,two,three,four,five,six from prob6_lotto where id='$id' and sid='$sid'
    and one='$one' and two='$two' and three='$three' and four='$four' and five='$five' and six='$six'";
    $info=mysqli_query($con,$query) or die("error query");
    while($row=mysqli_fetch_row($info)){
        if($sid==$row[1] && $id==$row[0] && $one==$row[2] && $two==$row[3]
        && $three==$row[4] && $four==$row[5] && $five==$row[6] && $six==$row[7]){
            $query="update prob6_user set point=point+50000 where id='$id' and sid='$sid'";
            mysqli_query($con,$query) or die("fail query");
            $_SESSION['prob6_point']=$_SESSION['prob6_point']+50000;
            return true;
        }
    }
    $query="update prob6_lotto set
    one=FLOOR(1+RAND()*(64-1)),
    two=FLOOR(1+RAND()*(64-1)),
    three=FLOOR(1+RAND()*(64-1)),
    four=FLOOR(1+RAND()*(64-1)),
    five=FLOOR(1+RAND()*(64-1)),
    six=FLOOR(1+RAND()*(64-1)))
    where id='$id' and sid='$sid'";
    mysqli_query($con,$query);
    return false;
}

function buy_root(){
    global $con;
    if($_SESSION['prob6_point']>=100000){
        $query="update prob6_user set point=point-100000 where id='$id' and sid='$sid'";
        mysqli_query($con,$query) or die("fail query");
        $_SESSION['prob6_point']=$_SESSION['prob6_point']-100000;
    echo "<script>alert('축하합니다!! 루트 동아리를 매입하셨습니다.');location.href='index.php';</script>";
    }else{
    echo "<script>alert('가진 돈이 부족하다..');location.href='index.php';</script>";
    }
}

function buy_flag(){
    global $con;
    if($_SESSION['prob6_point']>=10000){
        $query="update prob6_user set point=point-10000 where id='$id' and sid='$sid'";
        mysqli_query($con,$query) or die("fail query");
        $_SESSION['prob6_point']=$_SESSION['prob6_point']-10000;
    echo "<script>alert('FLAG{1nD1r5ct_SQL_1nJ5ct1on}');location.href='index.php';</script>";
    }else{
        echo "<script>alert('가진 돈이 부족하다..');location.href='index.php';</script>";
    }
}
?>