<?php
include 'header.php';
include 'data/config.php';
$my=my($_SESSION['prob9_id']);
?>
<link rel="stylesheet" type="text/css" href="css/memo.css">
<?php
foreach($my as $m){
?>
<div class="modal fade" id="my<?=$m[3]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="data/edit.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit&Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
  </div>
  <input type="hidden" name="idx" value="<?=$m[3]?>">
  <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="title" value="<?=$m[2]?>">
</div>
      </div>
      <div class="modal-footer">
        <a href="data/delete.php?idx=<?=$m[3]?>"><button type="button" class="btn btn-secondary">Delete</button></a>
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php
}
?>
<ul class="list-group">
<?php
foreach($my as $m){
?>
  <li class="list-group-item"><?=$m[2]?>
  <audio controls style="margin-left:10%;width:80%"><source src="<?=$m[0]?>" type="audio/<?=$m[1]?>"/></audio>
  <button class="menu_bar" data-toggle="modal" data-target="#my<?=$m[3]?>">
  <img src="https://png.icons8.com/material/50/000000/menu-2.png"></button></li>
<?php
}
?>
</ul>
<form class="memo_form" method="POST" enctype="multipart/form-data" action="data/upload.php">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
  </div>
  <input type="text" name="title" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <input class="input-group-text" type="submit" value="Upload">
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile01" name="audio">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div> 
</div>
</form>