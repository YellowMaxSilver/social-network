<?php
  include('configure.php');

  $post_name = $_POST['post_name'];
  $post_description = $_POST['post_description'];
  $tag_name = $_COOKIE['tag_name'];

  $sql = "insert into post(tag_name,post_name,post_description)
  values('{$tag_name}','{$post_name}','{$post_description}');";

  $res = $conn->query($sql);
?>