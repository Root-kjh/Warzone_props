<?php
session_start();
if(!isset($_SESSION['3id'])){
    include 'start.php';
    die;
}
if($_SESSION['3id']=='root'){
    if($_SERVER['REMOTE_ADDR']!='222.110.147.53'){
        session_destroy();
        header("Location: index.php");
        die;
    }
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
              <a class="nav-link" href="QnA.php">Q&A</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="write.html">Write</a>
            </li>
            <?php
            if($_SESSION['3id']=='root'){
                ?>
                <li class="nav-item">
                <a class="nav-link" href="flag.php">flag</a>
                </li>
                <?php
            }
            ?>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </nav>
        <h3 class="text-muted">QnA_Page</h3>
      </div>

      <div class="jumbotron">
        <h1 class="display-3">QnA_Page</h1>
        <p class="lead">질문을 올리시면 admin이 읽어줍니다.<br>읽은 질문은 초록색으로 표시됩니다.</p>
        <p><a class="btn btn-lg btn-success" href="QnA.php" role="button">Q&A</a></p>
      
	</div>

      <div class="row marketing">

      <footer class="footer">
        <p>© root_kjh 2018</p>
      </footer>

    </div>
</body></html>
