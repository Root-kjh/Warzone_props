<?php
session_start();
if(isset($_SESSION['prob7_id'])){
    include 'home.php';
    die;
}
?>
<!doctype html>
<head>
<title>ROOT_MEMO</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<style>
body{
    background-color:#e9ecef;
}
</style>
</head>
<body>
<div class="jumbotron">
  <h1 class="display-4">환영합니다!</h1>
  <p class="lead">ROOT_MEMO는 안전하고, 편리한 시스템을 자랑합니다!</p>
  <hr class="my-4">
  <p><a href="signup.php">회원가입</a>/<a href="login.php">로그인</a> 후 무료로 이용 가능합니다!</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="login.php" role="button">로그인</a>
  </p>
</div>
</body>
</html>