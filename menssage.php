<?php
    include('configure.php');
    include('functions.php');

    $to_user = $_GET['user'];

    if(isset($_COOKIE['tag_name'])){
        $self_user = $_COOKIE['tag_name'];
    }


    // to user information
    $sql_account = "Select * from user_account where tag_name = '{$to_user}'";
    $res_account = $conn->query($sql_account);
    $num_rows_account = $res_account->num_rows;

    if($num_rows_account == 1){
        $row_account = $res_account->fetch_object();
        $to_user_name = $row_account->user_name;
        $to_user_photo = $row_account->icon_img_link;
    }else{
        die ('critical error');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .menssage_section{
            /* border: 2px solid gray; */
            float: right;
            width: 70%;
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
        .followers_img{
                width: 20px;
                height: 20px;
                margin-top: 20px;
                filter: invert(100%);
        }
        .normal_text{
            font-family: Verdana, Geneva, Tahoma, sans-serif;   
        }
        .menssage_box{
            width: 100%;
            height: 400px;
            margin-top: 20px;
            border-radius: 20px;
            background-color: rgb(230, 230, 230);
            position: relative;
            overflow-y: auto;
            padding-top: 50px;
        }
        .self_menssage{
            width: 51%;
            min-height: 50px;
            background-color: rgb(240, 240, 240);
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            margin-bottom: 30px;
            float: right;
            box-shadow: 0px 0px 20px rgb(163, 163, 163);
            /* right: 0;
            bottom: 0; */
        }

        .user_menssage{
            width: 51%;
            min-height: 50px;
            background-color: white;
            margin-bottom: 30px;
            float: left;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            box-shadow: 0px 0px 20px rgb(163, 163, 163);
        }
        .menssage_text{
            margin-left: 10px;
            width: calc(100% - 40px);
            word-break:normal;
        }
        .date_text{
            margin-left: 10px;
            color: rgb(161, 161, 161);  
            margin-right: 20px; 
            margin-bottom: 0px;
            margin-top: 5px;
        }
        .write_menssage_box{
            margin-top: 10px;
        }
        .write_menssage{
            width: 80%;
            height: 20px;
            resize: none;
            outline: none;
            border: 0px;
            border-bottom: 3px solid black;
        }
        .alert_box{
            position: fixed;
            z-index: 7;
            right: 0;
            width: 400px;
            height: 100px;
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
        if(isset($_COOKIE['tag_name'])){
            echo '<script>self_user = "'.$self_user.'"</script>';
        }else{
            echo '<script>self_user = false</script>';
        }
        echo '<script>to_user = "'.$to_user.'"</script>';
    ?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="script.js"></script>

<div class="alert_box" id="alert_box">
    <div style="display: flex;width:400px">
        <div style="background-image: url('./icones/comment_icon.png');width:50px;margin-left:20px;"></div>
        <h4 class="normal_text" id="alert_box_text">Comment sended</h4>
    </div>
</div>

    <script>
        // function teste(){
        //     console.log('hello');
        // }

        
    
        function read_menssages(){
            var account_data = new FormData();
            account_data.append('self_user',self_user);
            account_data.append('to_user',to_user);
            $.ajax({
                url: 'loadmenssages.php',
                method: 'post',
                data: account_data,
                contentType: false,processData: false,
                success: function (data){
                    document.getElementById('box_converse').innerHTML = data;
                }
            })
            console.log('asdad')
        }

        setInterval(read_menssages, 2000);

        function send_menssage(){
            if(self_user != false){
                var menssage = document.getElementById('write_menssage').value;
                var data = new FormData();
                data.append('self_user',self_user)
                data.append('to_user',to_user)
                data.append('menssage',menssage);
                $.ajax({
                    url: 'send_menssage.php',
                    method: 'post',
                    data: data,
                    contentType: false,processData: false,
                    success: function (data){
                        console.log('success');
                        document.getElementById('write_menssage').value = '';
                    }
                })
            }else{
                alert_box(potion1='donot_account');
            }
        }
    </script>

    <div class="menssage_section">
        <div class="info">
            <form action="account.php" method="get" style="display:flex";>
                <input type="hidden" name="account" value='<?php echo $to_user?>'>
                <button class="hidden_button">
                    <div class="post_user_img" style="background-image: url('<?php echo knowing_image($to_user_photo)?>')"></div>
                </button>
                <h5 class="normal_text" style="margin-left: 10px;color:white"><?php echo $to_user_name?></h5>
                <button class="hidden_button" style="width: auto;height: auto;">
                    <h6 class="normal_text" style="margin-left: 10px;color:white"><?php echo $to_user?></h6>
                </button>   
            </form>   
            <!-- '.$final_value.'  -->
            <!-- <input type="hidden" name="tag_name" value='.$row->tag_name.'>
            <button class="follow_but"><h5 class="normal_text">follow</h5></button>    -->
        </div>

        <div class="menssage_box" id="box_converse">

            <!-- <div class="self_menssage">
                <h6 class="date_text normal_text">00/00/000</h6>
                <h4 class="menssage_text normal_text">my new text</h4>
            </div>


            <div class="user_menssage">
                <h6 class="date_text normal_text">00/00/000</h6>
                <h4 class="menssage_text normal_text">my new text</h4>
            </div> -->
            <?php
                // $sql = "select * from menssages where (user_tag1 = '@galinha' and user_tag2 = '@mr.river')or(user_tag1 = '@mr.river' and user_tag2 = '@galinha') 
                // order by date_menssage asc;";

                // $res = $conn->query($sql);
                // $num_rows = $res->num_rows;

                // if($num_rows > 0){
                //     while($row = $res->fetch_object()){
                //         $to_user = $row->user_tag2;
                //         $self_user = $row->user_tag1;
                //         if($to_user == '@galinha' && $self_user == '@mr.river'){
                //             echo '<div class="user_menssage">
                //             <h6 class="date_text normal_text">'.convert_date($row->date_menssage).'</h6>
                //             <h4 class="menssage_text normal_text">'.$row->menssage.'</h4>
                //             </div>';

                //         }elseif($to_user == '@mr.river' && $self_user == '@galinha'){
                //             echo '<div class="self_menssage">
                //                 <h6 class="date_text normal_text">'.convert_date($row->date_menssage).'</h6>
                //                 <h4 class="menssage_text normal_text">'.$row->menssage.'</h4>
                //                 </div>';
                //         }else{
                //              echo '<h3>erro</h3>';
                //         }
                //     }
                // }else{
                //     echo '<h3>there are no menssages.</h3>';
                // }
            
            ?>

        </div>
        <div class="write_menssage_box">   
            <textarea class="write_menssage normal_text" id="write_menssage" placeholder="Your Menssage" autocomplete="none"></textarea>
            <button onclick="send_menssage()">-></button>
        </div>

    </div>
    
</body>
</html>