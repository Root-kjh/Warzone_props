<?php
session_start();
if(isset($_SESSION['prob9_id'])){
    include 'home.php';
    die;
}
?>
<!doctype html>
<head>
<title>ROOT_Karaoke</title>
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
  <p class="lead">ROOT_Karaoke는 신나고, 재미있는 시스템을 자랑합니다!</p>
  <hr class="my-4">
  <p><a href="signup.html">회원가입</a>/<a href="login.html">로그인</a> 후 무료로 이용 가능합니다!</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="login.html" role="button">로그인</a>
  </p>
</div>
</body>
</html>