<?php
include('configure.php');
$text_comment = $_POST['text_comment'];
$post_id = $_POST['post_id'];
$tag_name = $_POST['tag_name'];

$sql = "insert into comments(post_id,tag_name,comment_description)
        values(\"{$post_id}\",\"{$tag_name}\",\"{$text_comment}\");";


$res = $conn->query($sql);
echo 'exito';
// header("location: index.php?post={$post_id}");
// exit;
?>