<form class="" action="<?php echo url_for('/manager/evaluation/new.php'); ?>" method="post">
  <div>
    <dl>
      <dt>ID :</dt>
      <dd><input type="text" name="id_ev" value=""></dd>
    </dl>
    <dl>
      <dt>Đánh giá :</dt>
      <dd><input type="text" name="substance" value=""></dd>
    </dl>
    <dl>
      <dt>Ngày đánh giá</dt>
      <dd><input type="date" name="date" value=""></dd>
    </dl>
    <input type="hidden" name="id_em" value="<?php echo $id_em; ?>">
    <input type="hidden" name="id_su" value="<?php echo $id_su; ?>">
    <input type="submit" name="" value="submit">
  </div>
</form>
