<?php
include 'header.php';
?>
<form action="data/lotto.php" method="POST">
  <div class="form-row">
    <div class="col">
      <input type="text" name="lotto[]" class="form-control" placeholder="Number">
    </div>
    <div class="col">
      <input type="text" name="lotto[]" class="form-control" placeholder="Number">
    </div>
       <div class="col">
      <input type="text" name="lotto[]" class="form-control" placeholder="Number">
    </div>
       <div class="col">
      <input type="text" name="lotto[]" class="form-control" placeholder="Number">
    </div>
       <div class="col">
      <input type="text" name="lotto[]" class="form-control" placeholder="Number">
    </div>
       <div class="col">
      <input type="text" name="lotto[]" class="form-control" placeholder="Number">
    </div>
    </div>
      <div class="form-row">
        <div class="col">
      <input type="submit" value="지르기" class="form-control">
    </div>
  </div>
</form>