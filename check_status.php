<?php
    include('configure.php');
    // $now_year = date('Y');
    // $now_mouth = date('m');
    // $now_day = date('d');
    // $now_date = $now_year.'-'.$now_mouth.'-'.$now_day;
    $self_tag = $_POST['self_user'];

    $sql = "select * from menssages where user_tag2 = '{$self_tag}' and  status_menssage is null order by date_menssage desc;";
    $res = $conn->query($sql);
    $num_row = $res->num_rows;
    if($num_row > 0){
        // while($row = $res->fetch_object()){
            $row = $res->fetch_object();
            $sql_search_account = "select user_name, tag_name from user_account where tag_name = '{$row->user_tag1}'";
            $res3 = $conn->query($sql_search_account);
            $num_rows_account = $res3->num_rows;
            if($num_rows_account == 1){
                $row_account = $res3->fetch_object();
                $name = $row_account->user_name;
            }else{
                die('erro profile not found');
            }

            echo 'alert_box(type="new_menssage",account="'.$row->user_tag1.'",text="'.$row->menssage.'",name="'.$name.'")';

            $sql_account = "update menssages set status_menssage = 'Y' where id = '{$row->id}'";
            $res2 = $conn->query($sql_account);
        //}
    }

?>