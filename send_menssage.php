<?php
    include('configure.php');
    $self_user = $_POST['self_user'];
    $to_user = $_POST['to_user'];
    $menssage = $_POST['menssage'];
    
    $sql = "insert into menssages(user_tag1,user_tag2,menssage)
    value('{$self_user}','{$to_user}','{$menssage}');  ";
    $res = $conn->query($sql);
?>