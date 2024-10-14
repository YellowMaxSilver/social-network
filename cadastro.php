<?php
 include('configure.php');
 $tag_name = $_POST['tag_name'];
 $name = $_POST['name'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $description = $_POST['description'];
 $ok = false;

 $sql_search = "select tag_name from user_account where tag_name = '{$tag_name}';";
 $res = $conn->query($sql_search); 
 $num_linhas = $res->num_rows;
 if($num_linhas == 0){
 $ok = true;   
 $sql = "insert into user_account(tag_name,user_name,user_description, sign_up, email, user_password, followers)
        values('{$tag_name}','{$name}','{$description}','2024-07-01','{$email}','{$password}', 0);";

  $res = $conn->query($sql);  
  setcookie('tag_name',$tag_name,time() + (60 * 60 * 24));
 }else{
  $ok = false; 
 }    

 header('location: index.php');
    exit;
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>My user</title>
</head>
<body>
    <div class="all">
        <section>
            <h2>Start account:</h2> 
            <?php
             if($ok == true){
             echo '<div class="itens_box"><p class="normal_text">Tag Name: '.$tag_name.'</p></div>
                <div class="itens_box"><p class="normal_text">Name: '.$name.'</p></div>
                <div class="itens_box"><p class="normal_text">Email: '.$email.'</p></div>
                <div class="itens_box"><p class="normal_text">Password: '.$password.'</p></div>
                <div class="itens_box"><p class="normal_text">Description: '.$description.'</p></div>';
             }else{
                echo '<h1 style="color:red;">tag_name found</h1>';   
             }  
            ?>
        </section>
    
        <div class="all_box">
          <div class="post">
            <div class="info"><h3 class="normal_text">name post</h3>
                <h5 class="normal_text" style="margin-left: 10px;color: rgb(161, 161, 161);">00/00/0000</h5>
            </div>
            <h4 class="normal_text">post description: exemple: today i goinig to my work bla bla bla bla
                blablablabla bla bla bla bla bla bla bla bla bla 
            </h4>
          </div>
        </div>
    </div>
    
</body>
</html> -->