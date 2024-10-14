<?php
    include('configure.php');
    $post_id = $_POST['post_id'];
    $self_tag_name = $_POST['self_tag_name'];

    $sql = "insert into like_control(post_id,tag_name)
    values('{$post_id}','{$self_tag_name}')";

    $res = $conn->query($sql);

?>