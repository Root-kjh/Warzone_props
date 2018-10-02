<?php
require 'config.php';
?>
<!Doctype html>
<html>
<head>
    <link href="./bootstrap.min.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
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
    <?php
      $result=showQnA();
      foreach($result as $r){
        if($r[1]=="true"){
    ?>
  <a href="view.php?idx=<?=$r[2]?>" class="list-group-item list-group-item-success"><?=$r[0]?></a>
        <?php }else{?>
  <a href="view.php?idx=<?=$r[2]?>" class="list-group-item list-group-item-warning"><?=$r[0]?></a>
<?php
        }
      }
?>
</div>
</div>
</body>
</html>