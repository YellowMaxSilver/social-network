<?php
include('configure.php');
    global $conn;
    $self_tag_name = $_POST['tag_name'];
    $read_follow = "select * from user_account where tag_name = '{$self_tag_name}'";

    $user = $_COOKIE['tag_name'];
    

    $res_1 = $conn->query($read_follow);
    $num_linhas_1 = $res_1->num_rows;

    if($num_linhas_1 > 0){
    $row = $res_1->fetch_object();
    $num_followers = $row->followers;
    $new_followers = $num_followers + 1;
    echo $num_followers;
    $write_followers = "update user_account 
    set followers = {$new_followers} where tag_name = '{$self_tag_name}';"; 

    $write_follow_control = "insert into followers_control(follower, followed)
    values('{$user}','{$self_tag_name}');";

    $res_1 = $conn->query($write_followers);  
    $res_1 = $conn->query($write_follow_control);  
    }

    header('location: index.php');
    exit;
?>