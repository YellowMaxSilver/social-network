<?php
  include('configure.php');
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "select * from user_account where email = '{$email}'";

  $res = $conn->query($sql);
  $num_linhas = $res->num_rows;
  if($num_linhas > 0){
   $row = $res->fetch_object();
   $oficial_password = $row->user_password;
   $tag_name = $row->tag_name;

   if($password == $oficial_password){
    echo 'acesso concedido';
    setcookie('tag_name',$tag_name,time() + 3600);
   }
   else{
    echo 'password icorrect';
    echo $oficial_password;
    echo $email;
    echo $password;
   }
  }else{
   echo 'email not found';
  }
 ?>