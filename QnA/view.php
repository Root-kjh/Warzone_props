<?php
require 'config.php';
$idx=$_GET['idx'];
$result=SearchIdx($idx);
if($_SESSION['3id']=="root" && $_SERVER['REMOTE_ADDR']=="222.110.147.53"){
  updateIdx($idx);
} else if($_SESSION['3id']!=$result[2]){
    echo "<script>
            alert('다른사람의 게시물을 훔쳐보시면 안됩니다...');
            location.href='QnA.php';
            </script>";
    die;
        }

?>
<!Doctype html>
<html>
<head>
    <link href="./bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills float-right">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="QnA.php">Q&A</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="write.html">Write</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </nav>
        <h3 class="text-muted">QnA_Page</h3>
      </div>
    <div class="list-group" style="margin-top: 10%;">
     <h1><?=$result[0]?></h1>
        <p><?=$result[1]?></p>
</div>
</div>
</body>
</html>
