<?php
include 'header.php';
include 'data/config.php';
$friends=search_friends($_SESSION['prob9_id']);
?>
<link rel="stylesheet" type="text/css" href="css/memo.css">
<form action="data/add_friend.php" method="POST">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <button class="btn btn-outline-secondary" type="submit">친구추가</button>
  </div>
  <input type="text" class="form-control" placeholder="ID" aria-label="" aria-describedby="basic-addon1" name="fid">
</div>
</form>
<?php
if(isset($friends)){
  ?>
<ul class="list-group">
  <li class="list-group-item"><?=$friends[2]?><audio controls style="margin-left:10%;width:80%"><source src="<?=$friends[0]?>" type="audio/<?=$friends[1]?>"/></audio></li>

</ul>
<?php
}
?>