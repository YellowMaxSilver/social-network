<?php
 include('configure.php');
 $search_value = $_GET['search_value'];
 
 $sql = "select * from user_account 
 where  tag_name like '%{$search_value}%' or user_name like '%{$search_value}%';";

 $res = $conn->query($sql);
 $num_rows = $res->num_rows;

 $sql_post = "select * from post
 where tag_name like '%{$search_value}%' or post_name like '%{$search_value}%';";
 $res_post = $conn->query($sql_post);
 $num_rows_post = $res_post->num_rows;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $search_value?></title>
</head>
<style>
        .normal_text{
         font-family: Verdana, Geneva, Tahoma, sans-serif;   
        }
        .resultados{
         width: 100%; 
         /* border: 1px solid gray;   */
         height: auto;
        }
        .account_result{
         margin-bottom: 20px;   
         width: 100%;
         min-height: 100px;
         background-color: rgb(214, 214, 214);  
         border-radius: 20px; 
         padding-left: 10px;
         padding-top: 10px;
         padding-bottom: 10px;
        }
        .post{
            margin: 10px 50px 10px;
            background-color: white;
            border-radius: 20px;
            width: 80%;
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
            margin-right: 20%;
            height: 500px;
            overflow-y: auto;
            overflow-x: hidden;
            justify-items: center;
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
      .account_bar{
       width: 100%;
       min-height: 150px;
       background-color: rgb(20,20,20); 
       border-radius: 20px;
       display: flex;
       position: relative;
       align-items: center;
       margin-bottom: 20px;
       cursor: pointer;
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
        a{
            text-decoration: none;
        }
</style>
<body>
        <form action="search.php" method="get">
            <div style="display: flex;">
                <input type="search" placeholder="search" autocomplete="off" name="search_value">
                <button>search</button>
            </div>
        </form>

    <?php
     echo "<h3 class='normal_text'>Busca por : '{$search_value}'.</h3>";
    ?>
    <div class="resultados">

        <!-- <div class="account_result">
            <h4 class="normal_text">Channel name</h4>
            <h5 class="normal_text">tag_name</h5>

            <div style="width: 30%;">
                <h5 class="normal_text">description: bla bla bla bla bla bla bla bla bla bla bla bla bla bla</h5>
            </div>
        </div> -->

        <?php
          if($num_rows > 0){
           while($row = $res->fetch_object()){
            $link_icon = $row->icon_img_link;
            echo '<a href="account.php?account='.$row->tag_name.'"><div class="account_bar">';
            
            if($link_icon != NULL){
                $link_icon_image =  './accounts_icons/'.$link_icon;
                }
                else{
                $link_icon_image =  './icones/user_icon.png';  
                }
                echo '<div class="post_user_img" style="background-image: url(\''.$link_icon_image.'\');"></div>';
            
            echo' <div class="account_info">';
            echo '<h3 class="normal_text bar_account_text">'.$row->user_name.'</h3>
            <div style="display: flex;height: 20px;align-items: center;">
              <h5 class="normal_text bar_account_text">'.$row->tag_name.'</h5>
              <h5 class="normal_text bar_account_text" style="margin-left: 20px;">'.$row->followers.'</h5>
              <img src="./icones/followers_icon.png" class="followers_img">
            </div>
            <h5 class="normal_text bar_account_text" style="width: 400px">'.$row->user_description.'</h5>
            </div>
            <button class="follow_but">Follow</button>'; 
            echo '</div></div></a>';
           }
          }else{
           echo "<h4 class='normal_text' style='color:red'>not found \"{$search_value}\"</h4>"; 
          }
        
        ?>



    </div>

    <div class="all_box">
      
        <?php
        if($num_rows_post > 0){
            while($row = $res_post->fetch_object()){
            echo '<div class="post">
             <div class="info">
                <h3 class="normal_text">'.$row->post_name.'</h3>
                <h5 class="normal_text" style="margin-left: 10px;color: rgb(161, 161, 161);">'.$row->date_post.'</h5>
                <h5 class="normal_text" style="margin-left: 20px">'.$row->tag_name.'</h5>
            </div>
            <h4 class="normal_text">'.$row->post_description.'</h4>
        </div>';
            }
        }
        ?>

    </div>




    
</body>
</html>