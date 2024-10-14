
<?php
 include('configure.php');
 
//  && isset($_COOKIE['tag_name'])
 if(isset($_FILES['imagem'])){
  var_dump($_FILES['imagem']);
  if($_FILES['imagem']['type'] == 'image/png'){

  }
  //  $final_name = $_COOKIE['tag_name'].'_icon.png';
  //  move_uploaded_file($_FILES['imagem']['tmp_name'], 'accounts_icons/'. $final_name);
  //  $tag_name = $_COOKIE['tag_name'];
  //  $sql = "update user_account set icon_img_link = '{$final_name}' where tag_name = '{$tag_name}'";
  //  $res = $conn->query($sql);
}else{
  echo 'nao existe';  
}


//  $res = $conn->query($sql);
//  $num_row = $res->num_rows;

//  if($num_row > 0){
//  $imagem = $res->fetch_object();
//  $faca = $imagem["user_img"];
//  echo '<img src="getuser_img.php?Picnum=$imagem->user_img">';
//  }else{
//   echo 'falos';  
//  }

// //  $sql = "insert into user_account(tag_name, user_name, sign_up, email, user_password, user_img)
// //  values('@aidsuh','asdgdssd','0000-00-00','hello@gmail.com','12345', {$imagem});";

// //  $res = $conn->query($sql);
  exit;
?>