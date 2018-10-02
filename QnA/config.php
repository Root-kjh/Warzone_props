<?php
session_start();
$dsn = "mysql:host=localhost;port=3306;dbname=chall;charset=utf8";
ini_set('pcre.backtrack_limit', '200000');
try {
    $con = new PDO($dsn, "prob3", "4dminroot!");
    $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
    echo $e->getMessage();
    }

    function matchId($id){
        global $con;
        $stmt=$con->prepare('select id from prob3');

        $stmt->execute();
        $row=$stmt->fetchAll(PDO::FETCH_NUM);
        foreach($row as $r){
            if(strtolower($r[0])==strtolower($id))
            return true;
        }
        return false;
    }

    function signup($id,$pw){
        global $con;
        $stmt=$con->prepare('insert into prob3 (id,pw) values(:id,:pw)');
        $stmt->bindParam(':id',$id,PDO::PARAM_STR);
        $stmt->bindParam(':pw',$pw,PDO::PARAM_STR);
        $stmt->execute();
    }

    function login($id,$pw){
            global $con;
            $stmt=$con->prepare('select id from prob3 where id=:id and pw=:pw');
            $stmt->bindParam(':id',$id,PDO::PARAM_STR);
            $stmt->bindParam(':pw',$pw,PDO::PARAM_STR);
            $stmt->execute();
            $row=$stmt->fetchAll(PDO::FETCH_NUM);
            foreach ($row as $r) {
                $_SESSION['3id']=$r[0];
        }
    }

    function write($id,$title,$content){
        global $con;
        $stmt=$con->prepare('insert into prob3_qna (id,title,content) values(:id,:title,:content)');
        $stmt->bindParam(':id',$id,PDO::PARAM_STR);
        $stmt->bindParam(':title',$title,PDO::PARAM_STR);
        $stmt->bindParam(':content',$content,PDO::PARAM_STR);
        $stmt->execute();
    }

    function showQnA(){
        global $con;
        $id=$_SESSION['3id'];
        $stmt=$con->prepare('select title,status,idx from prob3_qna where id=:id');
        $stmt->bindParam(':id',$id,PDO::PARAM_STR);
        $stmt->execute();
        $row=$stmt->fetchAll(PDO::FETCH_NUM);
        $count=0;
        foreach ($row as $r) {
            $ret[$count]=[$r[0],$r[1],$r[2]];
            $count++;
    }
    return  $ret;
    }
    
    function showQnAAll(){
        global $con;
        $false="false";
        $stmt=$con->prepare('select idx from prob3_qna where status=:false');
        $stmt->bindParam(':false',$false,PDO::PARAM_STR);
        $stmt->execute();
        $row=$stmt->fetchAll(PDO::FETCH_NUM);
        $count=0;
        foreach($row as $r){
            $ret[$count]=$r[0];
            $count++;
        }
        return $ret;
    }

    function SearchIdx($idx){
        global $con;
        $stmt=$con->prepare('select title,content,id from prob3_qna where idx=:idx');
        $stmt->bindParam(':idx',$idx,PDO::PARAM_INT);
        $stmt->execute();
        $row=$stmt->fetchAll(PDO::FETCH_NUM);
        foreach($row as $r){
            $ret=[$r[0],$r[1],$r[2]];
        }
        return $ret;
    }

    function updateIdx($idx){
        global $con;
        $true="true";
        $stmt=$con->prepare('update prob3_qna set status=:true where idx=:idx');
        $stmt->bindParam(':true',$true,PDO::PARAM_STR);
        $stmt->bindParam(':idx',$idx,PDO::PARAM_INT);
        $stmt->execute();
    }
?>