<?php
include 'header.php';
include 'data/config.php';
$Memos=Memos($_SESSION['prob7_id'],$_SESSION['id']);
?>
<link rel="stylesheet" type="text/css" href="css/memo.css">
<?php
foreach($Memos as $m){
?>
<div class="modal fade" id="memo<?=$m[0]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="data/edit_memo.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">메모수정&삭제</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
  </div>
  <input type="hidden" name="idx" value="<?=$m[0]?>">
  <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="memo" value="<?=$m[1]?>">
</div>
      </div>
      <div class="modal-footer">
        <a href="data/delete_memo.php?idx=<?=$m[0]?>"><button type="button" class="btn btn-secondary">메모삭제</button></a>
        <button type="submit" class="btn btn-primary">메모 수정</button>
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
foreach($Memos as $m){
?>
  <li class="list-group-item"><?=$m[1]?><button class="menu_bar" data-toggle="modal" data-target="#memo<?=$m[0]?>"><img src="https://png.icons8.com/material/50/000000/menu-2.png"></button></li>
<?php
}
?>
</ul>
<form class="memo_form" method="POST" action="data/memo.php">
<div class="input-group mb-3">
  <input type="text" name="memo" class="form-control" placeholder="메모하기" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit">메모</button>
  </div>
</div>
</form>