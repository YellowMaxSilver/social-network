<?php
 include('configure.php');
 $tag_name = $_GET['account'];

 $sql = "select * from user_account where tag_name = '{$tag_name}';";
 $res = $conn->query($sql);
 $num_linhas = $res->num_rows;
 if($num_linhas > 0){
  $row = $res->fetch_object();
  $user_name = $row->user_name;
  $description = $row->user_description;
  $followers = $row->followers;
  $link_icon = $row->icon_img_link;
 }else{
  echo 'Error';
 }

 if(isset($_COOKIE['tag_name'])){
  $self_tag_name = $_COOKIE['tag_name'];
  echo '<h2 style="color:blue">'.$self_tag_name.'</h2>';
}else{
  echo '<h2 style="color:red">withnot account</h2>';
  $self_tag_name = 'unknow';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
     echo '<title>Chat: '.$tag_name.'</title>';
    ?>
    <style>
      .account_bar{
       width: 100%;
       min-height: 150px;
       background-color: rgb(20,20,20); 
       border-radius: 20px;
       display: flex;
       position: relative;
       align-items: center;
      }  
      .normal_text{
        font-family: Verdana, Geneva, Tahoma, sans-serif;   
       }
       .account_info{
        margin-left: 20px;
       }
       .follow_but{
        color: rgb(50, 115, 255);
        cursor:pointer;
        border: 2px solid rgb(50, 115, 255);
        border-radius: 40px;
        background-color: rgba(0,0,0,0%);
        height: 40px;
        width: 80px;
        position: absolute;
        right: 0;
        margin-right: 50px;
        }
        .post{
        margin: 10px 50px 10px;
        background-color: white;
        border-radius: 20px;
        width: 90%;
        padding: 10px 10px 10px;
        }

        .post .info{
        display: flex;
        width: 100%;
        margin-top: -20px; 
        }

        .all_box{
        background-color: rgb(230, 230, 230);
        border: 2px solid gray;
        border-radius: 20px;
        position: absolute;
        margin-top: 40px;
        width: 90%;
        height: 500px;
        overflow-y: auto;
        overflow-x: hidden;
        justify-items: center;
        }
        .follow_but_post{
          color: blue;
                cursor:pointer;
                margin-left:20px; 
                border-top: 0px;
                border-left: 0px;
                border-right: 0px;
                border-bottom: 0px;
                background-color: rgba(0,0,0,0%);
        }
        .post_user_img{
             width: 100px;
             height: 100px;
             border-radius: 50px;   
             background-color: black;
             margin-left: 10px;
             background-position: center;
             background-repeat: no-repeat;
             background-size: 100%;
        }
        .followers_img{
                width: 20px;
                height: 20px;
                filter: invert(100%);
        }
        .followers_img:hover{
         filter: invert(80%);
        }

        .bar_account_text{
         color:white; 
        }
        .bar_account_text:hover{
         color: rgb(189,189,189);
        }
    </style>
</head>
<body>
    <div class="account_bar">
       <?php
       if($link_icon != NULL){
        $link_icon_image =  './accounts_icons/'.$link_icon;
        }
        else{
          $link_icon_image =  './icones/user_icon.png';  
        }
        echo '<div class="post_user_img" style="background-image: url(\''.$link_icon_image.'\');"></div>';
       ?>
       <div class="account_info">
        <?php
          echo '<h3 class="normal_text bar_account_text">'.$user_name.'</h3>
          <div style="display: flex;height: 20px;align-items: center;">
            <h5 class="normal_text bar_account_text">'.$tag_name.'</h5>
            <h5 class="normal_text bar_account_text" style="margin-left: 20px;">'.$followers.'</h5>
            <img src="./icones/followers_icon.png" class="followers_img">
          </div>
          <h5 class="normal_text bar_account_text" style="width: 400px">'.$description.'</h5>
          </div>
          <button class="follow_but">Follow</button>'
        
      ?>
       </div></div>


    <div class="all_box">
  
    <?php
        $sql_primal = "select * from post where tag_name = '{$tag_name}' order by date_post desc";
        $res = $conn->query($sql_primal);
        
        $num_linhas = $res->num_rows;

        if($num_linhas > 0){
            while($row = $res->fetch_object()){
             $sql_follow_control = " select * from followers_control
             where follower = '{$self_tag_name}' and followed = '{$row->tag_name}'";

             $res_2 = $conn->query($sql_follow_control);
             $num_rows = $res_2->num_rows;

             
             if($num_rows > 0){
              
            //    $row_control = $res_2->fetch_object();
              $final_value = '<h5 class="normal_text" style="color:gray;margin-left: 20px;">following</h5>';
             }elseif($row->tag_name == $self_tag_name){
                $final_value = '<h5 class="normal_text" style="color:green;margin-left: 20px;">your self</h5>';
             }
             else{

                $final_value = '<form action="add_follow.php" method="post">
                        <input type="hidden" name="tag_name" value='.$row->tag_name.'>
                        <button class="follow_but_post"><h5 class="normal_text">follow</h5></button>
                    </form> '; 
             }
            

            echo '<div class="post">
                <h3 class="normal_text">'.$row->post_name.'</h3>        
             <div class="info">
                <h5 class="normal_text" style="margin-left: 10px;color: rgb(161, 161, 161);">'.$row->date_post.'</h5>
                <h5 class="normal_text" style="margin-left: 20px">'.$row->tag_name.'</h5>
                    '.$final_value.'       
            </div>
            <h4 class="normal_text">'.$row->post_description.'</h4>
        </div>';
            }
        }
        ?>
        
      </div>
</body>
</html>