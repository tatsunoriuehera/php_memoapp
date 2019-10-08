<?php
require ("");//db connect
?>

<!doctype html>
<h4>practice</h4>
<?php
if(isset($_GET["id"])&& is_numeric($_GET["id"])){
  $id=$_GET["id"];
  $statement=$db->prepare("delete from memos where id=?");
  $statement->execute(array($id));
}
?>
<pre>
  <p>memo is delete</p>
  <p><a href="output_do.php">back to output_do</a></p>
</pre>
