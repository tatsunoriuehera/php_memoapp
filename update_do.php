<?php
require ("");//db connect
 ?>

<!doctype html>
<main>
<h4>practice</h4>
<?php
$statement=$db->prepare("update memos set memo=? where id=?");
$statement->execute(array($_POST["memo"],$_POST["id"]));
?>
<p>memo is changed</p>
<p><a href="output_do.php">back to output_do</a></p>
</main>
