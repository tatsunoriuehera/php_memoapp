
<!--inputしたメモの詳細-->
<?php
require ("");//db connect

$id=$_GET["id"];
if(!is_numeric($id)||$id<=0){//numeric 数字かどうかの判定
  print("bigger 0 number only!");
  exit();
}

$memos=$db->query("select * from memos where id=?");
$memos->execute(array($_GET["id"]));//GET又はREQUEST URLパラメータ
$memo=$memos->fetch();
?>
<body>
<article>
  <pre><?php print ($memo["memo"]); ?></pre>
  <a href="update.php?id=<?php print($memo["id"]); ?>">go to update</a>
  |
  <div id="del"><a href="delete.php?id=<?php print($memo["id"]); ?>">go to delete</a></div>
  |
  <a href="output_do.php">back to output_do</a>
</article>
<script>
  document.getElementById("del").onclick=function(){
    confirm("this memo is delete?");
  }
</script>
</body>
