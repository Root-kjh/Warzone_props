<?php
session_start();
if(!isset($_SESSION['prob7_id'])){
    include 'start.php';
    die;
}
?>
<!doctype html>
<head>
<title>ROOT_MEMO</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
<style>
body{
    background-color:#e9ecef;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="home.php">ROOT_MEMO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="home.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="memo.php">MY_MEMO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="data/logout.php">Logout</a>
      </li>
            <li class="nav-item">
        <a class="nav-link disabled" href="javascript:;"><?=$_SESSION['prob7_id']?>님</a>
      </li>
    </ul> 
  </div>
</nav>
<div style="margin-bottom:10%;"></div>
</body>
</html>