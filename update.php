<?php
require ("");//db connect
?>

<!doctype html>
<h4>practice</h4>
<?php
  if(isset($_GET["id"]) && is_numeric($_GET["id"])){
    $id=$_GET["id"];

    $memos=$db->prepare("select * from memos where id=?");
    $memos->execute(array($id));
    $memo=$memos->fetch();
  }
?>
<form action="update_do.php" method="post">
  <input type="hidden" name="id" value="<?php print($id); ?>"><!--どのメモを変更するか-->
  <textarea name="memo" rows="8" cols="80" placeholder="please update memo"><?php print($memo["memo"]); ?></textarea>
  <div><button type="submit">submit</button></div>
