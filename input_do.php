<!--insertはexecを使用しない-->

<?php
require ("");//db connect
/*
直接SQLを書かないで、？を利用してformの値を指定する
$statement=$db->exec("insert into memos set memo=" $ S_POST["memo"]",created_at=now()");
*/
$statement=$db->prepare("insert into memos set memo=?,created_at=now()");//prepare:値をエスケープ
$statement->execute(array($_POST["memo"]));//$_POST["memo"]:formの値を取得
echo "message si submit!";

/*
bindParamでの書き方
executeでは文字列しか渡せないので、型を指定して渡したい場合はbindParamを使う
*/
$statement=$db->prepare("insert into memos set memo=?,created_at=now()");//prepare:値をエスケープ
$statement->bindParam(1,$_POST["memo"],PDO::PARAM_INT);//(パラメータの順番、値、型の指定)
$statement->execute();
?>
