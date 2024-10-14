<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Chat</title>
    <style>

            @keyframes animation_show_alert_box{
                0%{display:none;margin-right: -200px;opacity: 0%;}
                100%{display: flex;margin-right: 0px;opacity: 100%;}
            }
            @keyframes animation_hidden_alert_box{
                0%{display: flex;margin-right: 0px;opacity: 100%;}
                100%{display:none;margin-right: -200px;opacity: 0%;}
            }

            body{
                background-color: rgb(34, 34, 34);
            }

            .all{
            display: flex;   
            position: relative;
            z-index: 1;
            }

            .itens_box{
                display: flex;   
                align-items: center;
            }

            .all_box{
                background-color: rgb(34, 34, 34);
                border: 2px solid gray;
                border-radius: 20px;
                width: 50%;
                position: absolute;
                right: 0;
                margin-right: 28%;
                height: 500px;
                overflow-y: auto;
                overflow-x: hidden;
                justify-items: center;
            }

            .self_box_account{
                background-color: rgb(230, 230, 230);
                border: 2px solid gray; 
                width: 27%;
                float: right;
                position: absolute;
                right: 0;
                margin-right: 0px;
                height: 500px;
                border-radius: 20px;
                overflow-y: auto;
                overflow-x: hidden;
            }
            .comment_box{
                width: 100%;height:80px;
                background-color:white;
                display: flex;
                align-items: center;  
                justify-content: center;
            }

            .normal_text{
            font-family: Verdana, Geneva, Tahoma, sans-serif;   
             word-break: keep-all;
            }

            .post{
            margin: 10px 50px 10px;
            background-color: white;
            border-radius: 20px;
            width: 80%;
            padding: 10px 10px 10px;
            }

            .info{
            display: flex;  
            width: 100%;
            height: 40px;
            margin-top: -20px; 
            align-items: center;
            position: relative;
            margin-top: 0px;
            background-color: rgb(20,20,20);
            border-radius: 10px;
            }

            .add_post_window{
                display: none;
                position: fixed;
                width: 90%;
                height: 80%;
                background-color: rgba(0,0,0,50%);
                backdrop-filter: blur(5px);
                z-index: 6;
                border-radius: 20px;
                margin-left: 50px;
                margin-top: 20px;
                color: white;
                padding-left: 30px;
            }
            a{
             list-style-type: none;   
            }
            .follow_but{
                color: rgb(34, 152, 255);
                cursor:pointer;
                margin-left:20px; 
                border-top: 0px;
                border-left: 0px;
                border-right: 0px;
                border-bottom: 0px;
                background-color: rgba(0,0,0,0%);
            }
            .following_button{
                color:gray;margin-left: 20px;margin-right:20px;right:0;position:absolute   
            }

            .hidden_button{
             border-bottom: 0px;border-top: 0px;border-left: 0px;border-right: 0px;
             background-color: rgba(0,0,0,0%);   
             cursor: pointer;
            }
            .post_user_img{
             width: 36px;
             height: 36px;
             border-radius: 50px;   
             background-color: black;
             margin-left: 10px;
             background-position: center;
             background-repeat: no-repeat;
             background-size: 100%;
            }
            .user_img{
                border-radius: 100%; 
                background-color: black;
                background-position: center;
                background-repeat: no-repeat;
                background-size: 100%;
            }
            .date_text{
                margin-left: 10px;
                color: rgb(161, 161, 161);  
                position: absolute;
                right: 0;
                margin-right: 20px; 
            }
            .followers_img{
                width: 20px;
                height: 20px;
                margin-top: 20px;
                filter: invert(100%);
            }
            .status_post{
                display: flex;
                height: 20px;
                align-items: center;
                position: relative;
            }
            .like{
                position: absolute;
                right: 0;
                height: 20px;
                margin-right: 20px;  
                display: flex;
                align-items: center;
                margin-right: 80px;
            }
            .like_buttom{
                width: 20px;
                height: 20px;
                margin-top: 20px;
                background-size: 100%;
                background-repeat: no-repeat;
                background-position: center;
                cursor: pointer;
                margin-top: 0px;
            }
            .like_buttom:hover{
                filter: brightness(0.8);
            }
            .like_text{
             color: #F10010;
             margin-left: 5px; 
            }
            .comment_status{
                position: absolute;
                right: 0;
                height: 20px;
                margin-right: 20px;  
                display: flex;
                align-items: center;
            }
            .comment_status_text{
                color: #2B6AB7;
                margin-left: 5px; 
            }
            .better_comment{
                display: flex;
                background-color: rgb(235, 235, 235);
                border-radius: 20px;
                margin-top: 10px;
                cursor: pointer;
            }
            .better_comment .post_user_img{
             margin-top: 0px;  
             align-self: center; 
            }
            .text_comment{
                width: 84%;
                min-height: 40px;   
                margin-left: 20px;
            }
            .post_show_window{
                /* display: none; */
             position: absolute;
             right: 0;
             width: 48%;
             background-color: rgba(0, 0, 0, 80%);   
             backdrop-filter: blur(4px);
             height: 100%;
             padding-left: 10px;
             padding-right: 10px;
             overflow-y: auto;
             overflow-x: hidden;
            }
            .show_post{
            background-color: white;
            border-radius: 20px;
            width: 96%;
            padding: 10px 10px 10px; 
            min-height: 100px; 
            }
            .box_comment{
                background-color: white;
                border-bottom-left-radius: 20px;
                border-bottom-right-radius: 20px;
                width: 96%;
                padding: 10px 10px 10px; 
                min-height: 50px;   
            }
            .name_post_control{
             height: auto;width: 65%;   
            }
            .show_comment{
             margin-top: 40px;   
            }
            .comment{
             margin-bottom: 20px;   
            }
            .write_box{
                width: 80%;
                height: auto;
                min-height: 26px;
                margin-left: 20px;
                font-size:17px;   
                resize: none;
                background-color: rgba(0,0,0,0%);
                color: white;
                border: 0px solid green;
                border-bottom: 3px solid white;
            }
            .write_box:focus{
               outline: 0; 
            }
            a{
                text-decoration: none; 
            }
            .box_img_post{
                border: 2px solid green;
                max-width: 80%;   
                height: auto;
                display: flex;
                justify-content: center;
                margin-left: 50px;
            }
            .img_post{
             width: 100%;
             /* background-position: center;
             background-repeat: no-repeat;
             background-size:100%; */
            }
            .img_post img{
                width: 100%;
            }
            .alert_box{
                position: fixed;
                z-index: 7;
                right: 0;
                width: 400px;
                min-height: 100px;
                background-color: rgb(31, 31, 31);
                border-radius: 20px;
                box-shadow: 0px 0px 10px black;
                display: none;
                justify-content: center;
                align-items: center;
            }
            .alert_box .normal_text{
                color: white;
                margin-left:20px;
            }
            .alert_box div{
                background-position: center;
                background-repeat: no-repeat;
                background-size: 100%;
            }
    </style>
    
</head>
<body> 
    <?php
        $self_tag_name = 'unknow';
        if(isset($_COOKIE['tag_name'])){
        $self_tag_name = $_COOKIE['tag_name'];
        echo '<script>var self_tag_name = "'.$_COOKIE['tag_name'].'";</script>';
        echo '<h2 style="color:blue">'.$self_tag_name.'</h2>';
        }else{
        echo '<h2 style="color:red">withnot account</h2>';
        $self_tag_name = 'NULL';
        echo '<script>var self_tag_name = "'.$self_tag_name.'";</script>';
        }
    ?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- <script src="script.js"></script> -->
 <script>
    
function alert_box(type,account,text,name){
    var alert_box = document.getElementById('alert_box');

        function whrite_box(menssage,image_url){
            return `<div style="display: flex;width:400px;">
                    <div style="background-image: url(`+image_url+`);width:50px;margin-left:20px;"></div>
                    <h4 class="normal_text" id="alert_box_text">`+menssage+`</h4>
                </div>`;   
        }


    if(type == 'send_comment'){
        alert_box.innerHTML = 
        whrite_box(
            menssage='Comment sent',
            image_url='./icones/comment_icon.png'
        );
    }

    else if(type == 'donot_account'){
     alert_box.innerHTML = 
     whrite_box(
            menssage='You do not have an account <a>do you want to create an account?</a>',
            image_url='./icones/followers_icon.png'
        );
     
    }

    else if(type == 'already_like'){
        alert_box.innerHTML = 
        whrite_box(
            menssage='You already liked this post',
            image_url='./icones/like_icon.png'
        );
    }

    else if(type == 'like_post'){
        alert_box.innerHTML = 
        whrite_box(
            menssage='You Like this post',
            image_url='./icones/liked_icon.png'
        );
    }

    else if(type == 'new_menssage'){
        alert_box.innerHTML = `
                <div style="display: flex;width:400px">
                    <div class="user_img" style="background-image: url('./accounts_icons/`+account+`_icon.png');width:70px;height:70px;margin-left:20px;"></div>
                    <div>
                        <h5 class="normal_text" id="alert_box_text" style="margin-bottom:-20px;color:gray">`+name+`</h5>
                        <h4 class="normal_text" id="alert_box_text">`+text+`</h4>
                    </div>
                </div>    
        `
    }


    alert_box.style = 'display:flex;animation-name: animation_show_alert_box;animation-duration: 0.5s;animation-fill-mode: forwards;';
    function hidden_alert_box(){
        document.getElementById('alert_box').style = "display:flex;animation-name: animation_hidden_alert_box;animation-duration: 0.5s;animation-fill-mode: forwards;";  
    }
    var time = setTimeout(hidden_alert_box, 5500)
   }
 </script>




<!-- @@@@@@@@@@@@@@@@@@ -->
<script>
        if(self_tag_name != 'NULL'){
        setInterval(check_status, 6000)
        }
        function check_status(){
            var self_data = new FormData();
            self_data.append('self_user',self_tag_name);

            $.ajax({
                url: 'check_status.php',
                method: 'post',
                data: self_data,
                processData: false,
                contentType: false,
                success: function(data){
                    console.log(data)
                    if(data != ''){
                        eval(data);
                    }
                }
            });
        }


       function show_add_post_window(){
        var window = document.getElementById('add_post_window');
        window.style = 'display:block';
       }

       function hidden_add_post_window(){
        var window = document.getElementById('add_post_window');
        window.style = 'display:none';
       }
       function add_follow(potion1){

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'add_follow.php', true);
        xhr.send();

        window.alert("now you are following "+ potion1)
       }

       function convert_date(potion1){
        return 'faca';
       }
       

       function add_self_comment(){
            if(self_tag_name != 'NULL'){
                var dados = new FormData();
                dados.append('text_comment',document.getElementById('comment_self').value);
                dados.append('post_id',document.getElementById('post_self_id').value);
                dados.append('tag_name',self_tag_name);
                $.ajax({
                    url: 'comment.php',
                    method: 'post',
                    data: dados,
                    processData: false,
                    contentType: false,
                    success: function(data){
                                console.log('hi: '+data)
                                document.getElementById('comment_self').value = '';
                                alert_box(type='send_comment');
                            }
                })
            }else{
                alert_box(type='donot_account');
            }
       }

       function add_self_like(id){
            post_data = new FormData();
            post_data.append('post_id',id);
            post_data.append('self_tag_name',self_tag_name);
            $.ajax({
                url: 'add_like.php',
                method: 'post',
                data: post_data,
                processData: false,
                contentType: false,
                success: function(){
                    alert_box(type='like_post')
                }
                    
            })
       } 




       function window_post(id){
            var post_id = new FormData();
            post_id.append('post',id);

            $.ajax({
                url: 'show_post.php',
                method: 'post',
                data: post_id,
                processData: false,
                contentType: false,
                success: function(data){
                   document.getElementById('post_window').innerHTML = data; 
                   console.log(self_tag_name);
                }
            })
       }

       function teste(){
        window.alert('hellows');
       }

       function hiiden_window_post(){
        document.getElementById('post_window').innerHTML = '';
       }

    </script>


<div class="add_post_window" id="add_post_window">
  <button onclick="hidden_add_post_window()">close</button>

  <form action="send_post.php" method="post">
      post name: <input type="text" autocomplete="off" name="post_name">  
      description: <textarea type="text" autocomplete="off" name="post_description"></textarea>  
      <button type="submit">send</button>
  </form>

</div>

<div class="alert_box" id="alert_box">
    <div style="display: flex;width:400px">
        <div style="background-image: url('./icones/comment_icon.png');width:50px;margin-left:20px;"></div>
        <h4 class="normal_text" id="alert_box_text">Comment sended</h4>
    </div>
</div>

<!-- <div class="alert_box" id="alert_box">
    <div style="display: flex;width:400px">
        <div class="user_img" style="background-image: url('./accounts_icons/@mr.river_icon.png');width:70px;height:70px;margin-left:20px;"></div>
        <div>
            <h5 class="normal_text" id="alert_box_text" style="margin-bottom:-20px;color:gray">Mr.river</h5>
            <h4 class="normal_text" id="alert_box_text">Where are you now?</h4>
        </div>
    </div>
</div> -->




    <?php
    include('configure.php');
    include('functions.php');
      $sql_primal = "select * from post order by date_post desc limit 10";
      $res = $conn->query($sql_primal);
      
      $num_linhas = $res->num_rows;

    ?>

<div class="all">
    <section>
        <form action="search.php" method="get">
            <div style="display: flex;">
                <input type="search" placeholder="search" autocomplete="off" name="search_value">
                <button>search</button>
            </div>
        </form>


        <form action="cadastro.php" method="post">
        <h2>Start account:</h2> 
        <div class="itens_box"><p class="normal_text">Tag Name: </p><input type="text" name="tag_name" autocomplete="off" value="@" placeholder="@your_tag_name"></div>
            <div class="itens_box"><p class="normal_text">Name: </p><input type="text" name="name" autocomplete="off" placeholder="your name"></div>
            <div class="itens_box"><p class="normal_text">Email: </p><input type="email" name="email" autocomplete="off" placeholder="your_email@domain.com"></div>
            <div class="itens_box"><p class="normal_text">Password: </p><input type="password" name="password" autocomplete="off" placeholder="MyPassword12345.*"></div>
            <div class="itens_box"><p class="normal_text">Description: </p><textarea type="text" name="description"autocomplete="off" placeholder="this my account. I very happy haha"></textarea></div>
            <button>Submit</button>
        </form>
        <form action="login.php" method="post">
            <h2>login account:</h2> 
                <div class="itens_box"><p class="normal_text">Email: </p><input type="email"  name='email' autocomplete="off" placeholder="your_email@domain.com"></div>
                <div class="itens_box"><p class="normal_text">Password: </p><input type="password" name="password" autocomplete="off" placeholder="MyPassword12345.*"></div>
                <button>login</button>
            </form>
         <form action="upload.php" method='post' enctype="multipart/form-data">
              <input type="file" name="imagem">
              <button>prosseguir</button>
         </form>   
        <!-- <button onclick="alert_box('send_comment')">My user</button> -->
        <button onclick="window_post('1a921502bd')">My user</button>
         

    </section>

    <div class="all_box">
      <button onclick="show_add_post_window()">add post</button>

      <!-- <div class="post">       
             <div class="info">
                <form action="account.php" method="get" style="display:flex";>
                    <input type="hidden" name="account" value='.$row->tag_name.'>
                    <button class="hidden_button">
                        <div class="post_user_img" style="background-image: url('./icones/user_icon.png')"></div>
                    </button>
                    <button class="hidden_button" style="width: auto;height: auto;">
                        <h5 class="normal_text" style="margin-left: 10px;color:white">'.$row->tag_name.'</h5>
                    </button>   
                    <h6 class="normal_text" style="margin-left: 10px;color:white;margin-right:10px">'.$num_followers.'</h6>
                    <img src="./icones/followers_icon.png" class="followers_img">
                </form>   
                '.$final_value.' 
                <input type="hidden" name="tag_name" value='.$row->tag_name.'>
                <button class="follow_but"><h5 class="normal_text">follow</h5></button>   
            </div>
            <div style="margin-left: 20px;">
                <div style="display: flex;position:relative;"><h3 class="normal_text">'.row->post_name.'</h3><h5 class="normal_text date_text">'.row->date_post.'</h5></div>
                <h4 class="normal_text">'.row->post_description.'</h4>
            </div>

            <div class="box_img_post">
                <div class="img_post" style="background-image: url('./icones/banner_icon.jpg');"></div>
                <div class="img_post"><img src="./accounts_icons/@mr.river_icon.png"></div>
            </div>

            <div class="status_post">
                <div class="like">
                    <div class="like_buttom" style="background-image: url('./icones/like_icon.png');"></div>
                    <h5 class="normal_text like_text">10</h5>
                </div>
                <div class="comment_status">
                    <div class="like_buttom" style="background-image: url('./icones/comment_icon.png');"></div>
                    <h5 class="normal_text comment_status_text">10</h5>
                </div>
            </div>
            <div class="better_comment">
                <div class="post_user_img" style="background-image: url('./icones/user_icon.png')"></div>
                <div class="text_comment">
                    <h5 class="normal_text">My comment bla bla bla bla bla hygfau yuy ydgfu  huhaidu</h5>
                </div>
            </div>
        </div>
         -->
      
        <?php
        function time_line(){
            global $num_linhas;
            global $res;
            global $conn;
            global $self_tag_name;
        if($num_linhas > 0){
            while($row = $res->fetch_object()){
             $sql_follow_control = " select * from followers_control
             where follower = '{$self_tag_name}' and followed = '{$row->tag_name}'";


            $sql_num_like = "select * from like_control where post_id = '{$row->post_id}';";
            $res_num_like = $conn->query($sql_num_like);
            $num_like = $res_num_like->num_rows;

             $sql_like_control = "select * from like_control where tag_name = '{$self_tag_name}' and post_id = '{$row->post_id}';";
             $res_like_control = $conn->query($sql_like_control);
             $num_row_like_control = $res_like_control->num_rows;
             if($num_row_like_control > 0){
                $like_div = '<div class="like_buttom" onclick="alert_box(\'already_like\')" style="background-image: url(\'./icones/liked_icon.png\');"></div>
                <h5 class="normal_text like_text">'.$num_like.'</h5>';
             }elseif(isset($_COOKIE['tag_name'])){
                $like_div = '<button class="hidden_button" onclick="add_self_like(\''.$row->post_id.'\')"><div class="like_buttom" style="background-image: url(\'./icones/like_icon.png\');"></div></button>
                <h5 class="normal_text like_text">'.$num_like.'</h5>';
             }else{
                $like_div = '<button class="hidden_button" onclick="alert_box(\'donot_account\')"><div class="like_buttom" style="background-image: url(\'./icones/like_icon.png\');"></div></button>
                <h5 class="normal_text like_text">'.$num_like.'</h5>';
             }




             $sql_better_comment = "select * from comments where post_id = '{$row->post_id}' limit 1;";
             $res_better_comment = $conn->query($sql_better_comment);
             $num_row_better_comment = $res_better_comment->num_rows;
             if($num_row_better_comment > 0 && $num_row_better_comment < 2){
                $row_better_comment = $res_better_comment->fetch_object();
                $better_comment_div = '
                <div class="better_comment" id="better_comment" onclick="window_post(\''.$row->post_id.'\')">
                    <div class="post_user_img" style="background-image: url(\'./icones/user_icon.png\')"></div>
                    <div class="text_comment">
                        <h5 class="normal_text">'.$row_better_comment->comment_description.'</h5>
                    </div>
                </div>';
             }else{
                $better_comment_div = '
                <div class="better_comment" id="better_comment" onclick="window_post(\''.$row->post_id.'\')">
                    <div class="post_user_img" style="background-image: url(\'./icones/user_icon.png\')"></div>
                    <div class="text_comment">
                        <h5 class="normal_text">to comment</h5>
                    </div>
                </div>';
             }

             $sql_num_comments = "select * from comments where post_id = '{$row->post_id}'";
             $res_num_comments = $conn->query($sql_num_comments);
             $num_comments = $res_num_comments->num_rows;



             $res_2 = $conn->query($sql_follow_control);
             $num_rows = $res_2->num_rows;

             $sql_num_follow = "select * from user_account where tag_name = '{$row->tag_name}';";
             $res_3 = $conn->query($sql_num_follow);
             $num_linhas_num_follow = $res_3->num_rows;

             if($num_linhas_num_follow > 0){
              $row_follow = $res_3->fetch_object();
              $num_followers = $row_follow->followers; 
              $user_icon = $row_follow->icon_img_link;
             }else{
              echo 'something is wrong';  
             }

             
             if($num_rows > 0){
            //    $row_control = $res_2->fetch_object();
              $final_value = '<h5 class="normal_text" style="color:gray;margin-left: 20px;">following</h5>';
             }elseif($row->tag_name == $self_tag_name){
                $final_value = '<h5 class="normal_text" style="color:green;margin-left: 20px;">your self</h5>';
             }
             else{
                if(isset($_COOKIE['tag_name'])){
                $final_value = '<form action="add_follow.php" method="post">
                        <input type="hidden" name="tag_name" value='.$row->tag_name.'>
                        <button class="follow_but"><h5 class="normal_text">follow</h5></button>
                    </form> '; 
                }
                else{
                  $final_value =  '<button class="follow_but" onclick="show_dhave_account()"><h5 class="normal_text">follow</h5></button>'; 
                }    
             }



            echo '<div class="post">       
            <div class="info">
               <form action="account.php" method="get" style="display:flex";>
                   <input type="hidden" name="account" value='.$row->tag_name.'>
                   <button class="hidden_button">
                       <div class="post_user_img" style="background-image: url(\''.knowing_image($user_icon).'\')"></div>
                   </button>
                   <button class="hidden_button" style="width: auto;height: auto;">
                       <h5 class="normal_text" style="margin-left: 10px;color:white">'.$row->tag_name.'</h5>
                   </button>   
                   <h6 class="normal_text" style="margin-left: 10px;color:white;margin-right:3px">'.$num_followers.'</h6>
                   <img src="./icones/followers_icon.png" class="followers_img">
               </form>   
               '.$final_value.' 
           </div>
           <div style="margin-left: 20px;">
               <div style="display: flex;position:relative;color:black"><h3 class="normal_text">'.$row->post_name.'</h3>
               <h5 class="normal_text date_text">'.convert_date($row->date_post).'</h5></div>
               <h4 class="normal_text" style="color:black">'.$row->post_description.'</h4>
           </div>
           <div class="status_post">
                <div class="like">
                    '.$like_div.'
                </div>
                <div class="comment_status">
                    <div class="like_buttom" style="background-image: url(\'./icones/comment_icon.png\');"></div>
                    <h5 class="normal_text comment_status_text">'.$num_comments.'</h5>
                </div>
            </div>
            '.$better_comment_div.'
       </div>';
            }
        }}
        time_line();
        ?>

    </div>

    <div class="self_box_account">
        <div class="comment_box" style="margin-bottom: 20px;">
            <h4 class="normal_text">You are following:</h4>
        </div>
        <div class="following_box">

        <!-- <div class="info" style="height: 50px;margin-bottom:10px;">
                <form action="account.php" method="get" style="display:flex";>
                    <input type="hidden" name="account" value='.$row->tag_name.'>
                    <button class="hidden_button">
                        <div class="post_user_img" style="background-image: url('./icones/user_icon.png')"></div>
                    </button>
                    <button class="hidden_button" style="width: auto;height: auto;">
                        <h5 class="normal_text" style="margin-left: 10px;color:white">@tag_name</h5>
                    </button>   
                    <h6 class="normal_text" style="margin-left: 10px;color:white;margin-right:10px">100</h6>
                    <img src="./icones/followers_icon.png" class="followers_img">
                </form>   
                <input type="hidden" name="tag_name" value='.$row->tag_name.'>
                <h5 class="normal_text following_button">following</h5>
            </div>      -->

            <?php

                function read_who_following(){
                 global $conn;
                 global $self_tag_name;
                 
                 $sql = "select * from followers_control where follower = '{$self_tag_name}' order by followed asc;";
                 $res = $conn->query($sql);
                 $num_rows = $res->num_rows;

                 if($num_rows > 0){
                    while($row = $res->fetch_object()){
                        $self_sql = "select * from user_account where tag_name = '{$row->followed}'";
                        $res_1 = $conn->query($self_sql);
                        $num_row_res_1 = $res_1->num_rows;
                        if($num_row_res_1 > 0){
                            $row = $res_1->fetch_object();

                            $tag_name = $row->tag_name;
                            $num_followers = $row->followers;
                            $user_icon = $row->icon_img_link;
                            if($user_icon != NULL){
                                $link_icon_image =  './accounts_icons/'.$user_icon;
                             }
                             else{
                              $link_icon_image =  './icones/user_icon.png';  
                             }
                        }else{
                            die('something is whrong');
                        }


                        echo '<div class="info" style="height: 50px;margin-bottom:10px;">
                <form action="account.php" method="get" style="display:flex";>
                    <input type="hidden" name="account" value='.$tag_name.'>
                    <button class="hidden_button">
                        <div class="post_user_img" style="background-image: url(\''.$link_icon_image.'\')"></div>
                    </button>
                    <button class="hidden_button" style="width: auto;height: auto;">
                        <h5 class="normal_text" style="margin-left: 10px;color:white">'.$tag_name.'</h5>
                    </button>   
                    <h6 class="normal_text" style="margin-left: 10px;color:white;margin-right:10px">'.$num_followers.'</h6>
                    <img src="./icones/followers_icon.png" class="followers_img">
                </form>   
                <input type="hidden" name="tag_name" value='.$tag_name.'>
                <h5 class="normal_text following_button">following</h5>
            </div>     ';
                    }
                 }else{
                   echo '<h5 class="normal_text">you are not following anyone</h5>'; 
                 }
                }


                if(isset($_COOKIE['tag_name'])){
                 read_who_following();
                }else{
                 echo '<h5 class="normal_text">you do not have an account</h5>';   
                }
            ?>
        </div>
    </div>

    <?php

        // if(isset($_GET['post'])){
        //     $post_id = $_GET['post'];

        //     $sql = "select * from post where post_id='{$post_id}';";
        //     $res = $conn->query($sql);
        //     $num_rows_post = $res->num_rows;
        //     if($num_rows_post > 0 && $num_rows_post < 2){
        //         $row_post = $res->fetch_object();
        //       show_post($row_post->post_name,
        //                 $row_post->post_description,
        //                 $row_post->tag_name,
        //                 $row_post->post_id,
        //                 $row_post->date_post
        //             );  
        //     }else{
        //         die('erro');   
        //     }
        // }
        // function show_post($post_name,$post_description,$tag_name,$post_id,$date_post){
        //     global $conn;
        //     global $self_tag_name;
        //     $sql = "select * from user_account where tag_name = '{$tag_name}'";
        //     $res =  $conn->query($sql);
        //     $num_row = $res->num_rows;
        //     if($num_row > 0 && $num_row < 2){
        //      $row = $res->fetch_object();
        //      $img_link = $row->icon_img_link;
        //     }else{
        //      die('error na conta');   
        //     }

        //     $sql_followers = "select * from followers_control where followed = '{$tag_name}'";
        //     $res_flw =  $conn->query($sql_followers);
        //     $num_row_flw = $res_flw->num_rows;
        //     if($num_row_flw > 0){
        //         $num_followers = $num_row_flw;
        //     }else{
        //         $num_followers = 0; 
        //     }

        //  echo '<div class="post_show_window">
        //     <div class="info" style="height: 50px;margin-bottom:10px;">
        //         <form action="account.php" method="get" style="display:flex";>
        //             <input type="hidden" name="account" value="'.$tag_name.'">
        //             <button class="hidden_button">
        //                 <div class="post_user_img" style="background-image: url(\''.knowing_image($img_link).'\')"></div>
        //             </button>
        //             <button class="hidden_button" style="width: auto;height: auto;">
        //                 <h5 class="normal_text" style="margin-left: 10px;color:white">'.$tag_name.'</h5>
        //             </button>   
        //             <h6 class="normal_text" style="margin-left: 10px;color:white;margin-right:10px">'.$num_followers.'</h6>
        //             <img src="./icones/followers_icon.png" class="followers_img">
        //         </form>   
        //         <input type="hidden" name="tag_name" value=\'.$row->tag_name.\'>
        //         <h5 class="normal_text following_button">following</h5>
        //     </div>   

        //     <div class="show_post">
        //         <div style="margin-left: 20px;">
        //             <div style="display: flex;position:relative;">
        //                 <div class="name_post_control"><h3 class="normal_text">'.$post_name.'</h3></div>
        //                 <h5 class="normal_text date_text">'.convert_date($date_post).'</h5>
        //             </div>
        //             <h4 class="normal_text">'.$post_description.'</h4>
        //         </div>
        //     </div>
        //     <h7 class="date_text" style="font-size: 13px;">post id: '.$post_id.'</h7>';

        //     $sql_comment = "select * from comments where post_id = '{$post_id}'";
        //     $res_comment = $conn->query($sql_comment);
        //     $comments_rows = $res_comment->num_rows;
        //     echo '<div class="show_comment">
        //                 <h3 class="normal_text" style="color: white;">Comments: </h3>
        //                     <div class="self_comment" style="display: flex;margin-bottom: 40px;">
        //                         <input type="hidden" id="post_self_id" name="post_id" value='.$post_id.'>
        //                         <input type="hidden" name="tag_name" value='.$self_tag_name.'>
        //                         <div class="post_user_img" style="background-image: url(\'./icones/user_icon.png\')"></div>
        //                         <textarea id="comment_self" class="normal_text write_box" name="text_comment" rows="1" type="text" autocomplete="off"
        //                         maxlength="200" require spellcheck="true" placeholder="Comment"></textarea>
        //                         <button onclick="add_self_comment()">-></button> 
        //                     </div>
        //                  ';
        //     if($comments_rows > 0){
        //         echo '<h4 class="normal_text" style="color: white;">'.$comments_rows.' Comments</h4>';
        //         while($row_comment = $res_comment->fetch_object()){

        //             $sql_account_img = "select icon_img_link from user_account 
        //                                 where tag_name = '{$row_comment->tag_name}';";
        //             $res_account_img = $conn->query($sql_account_img);
        //             $num_row_account_img = $res_account_img->num_rows;
                    
        //             if($num_row_account_img > 0 && $num_row_account_img < 2){
        //                 $row_image = $res_account_img->fetch_object();    
        //             }else{ 
        //                 die('error'); 
        //             }
        //             echo '

        //                 <div class="comment">
        //                     <div class="info" style="height: 50px;margin-bottom:0px;">  
        //                         <form action="account.php" method="get" style="display:flex";>
        //                             <input type="hidden" name="account" value='.$row_comment->tag_name.'>
        //                             <button class="hidden_button">
        //                                 <div class="post_user_img" style="background-image: url(\''.knowing_image($row_image->icon_img_link).'\')"></div>
        //                             </button>
        //                             <button class="hidden_button" style="width: auto;height: auto;">
        //                                 <h5 class="normal_text" style="margin-left: 10px;color:white">'.$row_comment->tag_name.'</h5>
        //                             </button>   
        //                         </form> 
        //                         <h5 class="normal_text date_text">'.convert_date($row_comment->comment_date).'</h5> 
        //                     </div>

        //                     <div class="box_comment">
        //                         <h4 class="normal_text" wrap="hard">'.$row_comment->comment_description.'</h4>
        //                     </div>  
        //                 </div> ';
        //         }
        //     }
        //     else{
        //         echo '<h4 class="normal_text" style="color: white;">0 Comments</h4>';;   
        //     }  
        //     echo '</div></div>'; 
        // };
    ?>
    <div id="post_window" style="display: flex;">

    </div>
    <!-- <div class="post_show_window">
            <div class="info" style="height: 50px;margin-bottom:10px;">
                <form action="account.php" method="get" style="display:flex";>
                    <input type="hidden" name="account" value='.$row->tag_name.'>
                    <button class="hidden_button">
                        <div class="post_user_img" style="background-image: url('./icones/user_icon.png')"></div>
                    </button>
                    <button class="hidden_button" style="width: auto;height: auto;">
                        <h5 class="normal_text" style="margin-left: 10px;color:white">@tag_name</h5>
                    </button>   
                    <h6 class="normal_text" style="margin-left: 10px;color:white;margin-right:10px">100</h6>
                    <img src="./icones/followers_icon.png" class="followers_img">
                </form>   
                <input type="hidden" name="tag_name" value='.$row->tag_name.'>
                <h5 class="normal_text following_button">following</h5>
            </div>   

            <div class="show_post">
                <div style="margin-left: 20px;">
                    <div style="display: flex;position:relative;">
                        <div class="name_post_control"><h3 class="normal_text">post_name</h3></div>
                        <h5 class="normal_text date_text">'.row->date_post.'</h5>
                    </div>
                    <h4 class="normal_text">'.row->post_description.'</h4>
                </div>
            </div>
            <h7 class='date_text' style="font-size: 13px;">post id: ad765sdf567gs</h7>


            <div class="show_comment">
                <h3 class="normal_text" style="color: white;">Comments: </h3>

                

                 <div class="self_comment" style="display: flex;margin-bottom: 40px;">
                    <div class="post_user_img" style="background-image: url('./icones/user_icon.png')"></div>
                    <textarea class="normal_text write_box" rows="1" type="text" autocomplete="off"
                     maxlength="200" require spellcheck="true" placeholder="Comment"></textarea>
                 </div>

                

                <div class="comment">
                    <div class="info" style="height: 50px;margin-bottom:0px;">
                        <form action="account.php" method="get" style="display:flex";>
                            <input type="hidden" name="account" value='.$row->tag_name.'>
                            <button class="hidden_button">
                                <div class="post_user_img" style="background-image: url('./icones/user_icon.png')"></div>
                            </button>
                            <button class="hidden_button" style="width: auto;height: auto;">
                                <h5 class="normal_text" style="margin-left: 10px;color:white">@tag_name</h5>
                            </button>   
                        </form> 
                        <h5 class="normal_text date_text">1 year ago</h5> 
                    </div>

                    <div class="box_comment">
                        <h4 class="normal_text" wrap='hard'>my comment: bla bla bla bla bla bla bla bla bla bla</h4>
                    </div>  
                </div> 

            </div>
    </div> -->
</div> 


</body>
</html>