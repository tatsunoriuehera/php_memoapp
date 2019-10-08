
<!--inputしたメモの一覧表示-->
<?php
require ("");//db connect

//$page=$_GET["page"];
if(isset($_GET["page"]) && is_numeric($_GET["page"])){//isset:変数やパラメータが存在しているかどうか
  $page=$_GET["page"];
}else{
  $page=1;
}
$start=5*($page-1);

$memos=$db->query("select * from memos order by id desc limit ?,5");//limit 表示データの制限 ５件分
$memos->bindParam(1,$start,PDO::PARAM_INT);
$memos->execute();
?>

<article>
  <?php
  //while($memo=$memos->fetch()):
  foreach ($memos as $memo):
  ?>
  <!--
  mb_substrで文字の制限
  idを指定してURLパラメータで詳細画面へ移行
  -->
  <p>
    <a href="output_do_detail.php?id=<?php print ($memo["id"]); ?>">
      <?php print(mb_substr($memo["memo"],0,50)); ?>
      <!--
      メモが50文字以上あったら、"..."を表示。なければ""
      strlen文字列の長さを調べる
      -->
      <?php print((mb_strlen($memo["memo"])>50 ? "..." : "")); ?>
    </a>
  </p>
  <time><?php print($memo["created_at"]); ?></time>
  <hr />
<?php //endwhile: ?>
<?php //if($page>=2):
  $counts=$db->query("select count(*) ad cnt from memos");//memoの数をカウント
  $count=$counts->fetch();
  $max_page=floor($count["cnt"]/5+1);//ページ数のカウント（1ページ5件として）
  if($page<$max_page):
 ?>
<a href="output_do_detail.php?page=<?php print($page-1); ?>">go to <?php print($page-1); ?> page</a>
<?php endif; ?>
|
<a href="output_do_detail.php?page=<?php print($page+1); ?>">go to <?php print($page+1); ?> page</a>
</article>
