<?php
session_start();
if(isset($_SESSION['3id'])){
    include 'home.php';
    die;
}
?>
<!DOCTYPE html>
<!-- saved from url=(0060)https://v4-alpha.getbootstrap.com/examples/narrow-jumbotron/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>QnA_Page</title>

    <!-- Bootstrap core CSS -->
    <link href="./bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./narrow-jumbotron.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills float-right">
            <li class="nav-item">
              <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signup.html">SignUP</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.html">Login</a>
            </li>
          </ul>
        </nav>
        <h3 class="text-muted">QnA_Page</h3>
      </div>

      <div class="jumbotron">
        <h1 class="display-3">QnA_Page</h1>
        <p class="lead">플레그가 궁금하면 flag.php...</p>
        <p><a class="btn btn-lg btn-success" href="signup.html" role="button">Sign up today</a></p>
      </div>

      <div class="row marketing">
        <div class="col-lg-6">
          <h4>Question</h4>
          <p>The answer is very carefully</p>

          <h4>Question</h4>
          <p>The answer is very carefully</p>

          <h4>Question</h4>
          <p>The answer is very carefully</p>
        </div>

        <div class="col-lg-6">
          <h4>Question</h4>
          <p>The answer is very carefully</p>

          <h4>Question</h4>
          <p>The answer is very carefully</p>

          <h4>Question</h4>
          <p>The answer is very carefully</p>
        </div>
      </div>

      <footer class="footer">
        <p>© root_kjh 2018</p>
      </footer>

    </div>
</body></html>
