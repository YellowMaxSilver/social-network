<?php
    include('configure.php');
    include('functions.php');
    if(isset($_POST['post'])){
        $post_id = $_POST['post'];

        $sql = "select * from post where post_id='{$post_id}';";
        $res = $conn->query($sql);
        $num_rows_post = $res->num_rows;
        if($num_rows_post > 0 && $num_rows_post < 2){
            $row_post = $res->fetch_object();
          show_post($row_post->post_name,
                    $row_post->post_description,
                    $row_post->tag_name,
                    $row_post->post_id,
                    $row_post->date_post
                );  
        }else{
            die('erro');   
        }
    }
    function show_post($post_name,$post_description,$tag_name,$post_id,$date_post){
        global $conn;
        global $self_tag_name;
        $sql = "select * from user_account where tag_name = '{$tag_name}'";
        $res =  $conn->query($sql);
        $num_row = $res->num_rows;
        if($num_row > 0 && $num_row < 2){
         $row = $res->fetch_object();
         $img_link = $row->icon_img_link;
        }else{
         die('error na conta');   
        }

        $sql_followers = "select * from followers_control where followed = '{$tag_name}'";
        $res_flw =  $conn->query($sql_followers);
        $num_row_flw = $res_flw->num_rows;
        if($num_row_flw > 0){
            $num_followers = $num_row_flw;
        }else{
            $num_followers = 0; 
        }

     echo '
        <div class="post_show_window">
        <button onclick="hiiden_window_post()">close</button>
        <div class="info" style="height: 50px;margin-bottom:10px;">
            <form action="account.php" method="get" style="display:flex";>
                <input type="hidden" name="account" value="'.$tag_name.'">
                <button class="hidden_button">
                    <div class="post_user_img" style="background-image: url(\''.knowing_image($img_link).'\')"></div>
                </button>
                <button class="hidden_button" style="width: auto;height: auto;">
                    <h5 class="normal_text" style="margin-left: 10px;color:white">'.$tag_name.'</h5>
                </button>   
                <h6 class="normal_text" style="margin-left: 10px;color:white;margin-right:10px">'.$num_followers.'</h6>
                <img src="./icones/followers_icon.png" class="followers_img">
            </form>   
            <input type="hidden" name="tag_name" value=\'.$row->tag_name.\'>
            <h5 class="normal_text following_button">following</h5>
        </div>   

        <div class="show_post">
            <div style="margin-left: 20px;">
                <div style="display: flex;position:relative;">
                    <div class="name_post_control"><h3 class="normal_text">'.$post_name.'</h3></div>
                    <h5 class="normal_text date_text">'.convert_date($date_post).'</h5>
                </div>
                <h4 class="normal_text">'.$post_description.'</h4>
            </div>
        </div>
        <h7 class="date_text" style="font-size: 13px;">post id: '.$post_id.'</h7>';

        $sql_comment = "select * from comments where post_id = '{$post_id}'";
        $res_comment = $conn->query($sql_comment);
        $comments_rows = $res_comment->num_rows;
        echo '<div class="show_comment">
                    <h3 class="normal_text" style="color: white;">Comments: </h3>
                        <div class="self_comment" style="display: flex;margin-bottom: 40px;">
                            <input type="hidden" id="post_self_id" name="post_id" value='.$post_id.'>
                            <input type="hidden" name="tag_name" value='.$self_tag_name.'>
                            <div class="post_user_img" style="background-image: url(\'./icones/user_icon.png\')"></div>
                            <textarea id="comment_self" class="normal_text write_box" name="text_comment" rows="1" type="text" autocomplete="off"
                            maxlength="200" require spellcheck="true" placeholder="Comment"></textarea>
                            <button onclick="add_self_comment()">-></button> 
                        </div>
                     ';
        if($comments_rows > 0){
            echo '<h4 class="normal_text" style="color: white;">'.$comments_rows.' Comments</h4>';
            while($row_comment = $res_comment->fetch_object()){

                $sql_account_img = "select icon_img_link from user_account 
                                    where tag_name = '{$row_comment->tag_name}';";
                $res_account_img = $conn->query($sql_account_img);
                $num_row_account_img = $res_account_img->num_rows;
                
                if($num_row_account_img > 0 && $num_row_account_img < 2){
                    $row_image = $res_account_img->fetch_object();    
                }else{ 
                    die('error'); 
                }
                echo '

                    <div class="comment">
                        <div class="info" style="height: 50px;margin-bottom:0px;">  
                            <form action="account.php" method="get" style="display:flex";>
                                <input type="hidden" name="account" value='.$row_comment->tag_name.'>
                                <button class="hidden_button">
                                    <div class="post_user_img" style="background-image: url(\''.knowing_image($row_image->icon_img_link).'\')"></div>
                                </button>
                                <button class="hidden_button" style="width: auto;height: auto;">
                                    <h5 class="normal_text" style="margin-left: 10px;color:white">'.$row_comment->tag_name.'</h5>
                                </button>   
                            </form> 
                            <h5 class="normal_text date_text">'.convert_date($row_comment->comment_date).'</h5> 
                        </div>

                        <div class="box_comment">
                            <h4 class="normal_text" wrap="hard">'.$row_comment->comment_description.'</h4>
                        </div>  
                    </div> ';
            }
        }
        else{
            echo '<h4 class="normal_text" style="color: white;">0 Comments</h4>';;   
        }  
        echo '</div></div>'; 
    };
?>