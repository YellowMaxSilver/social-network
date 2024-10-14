<?php
    include('configure.php');
    include('functions.php');

    $self_user = $_POST['self_user'];
    $to_user = $_POST['to_user'];
    $sql = "select * from menssages where (user_tag1 = '{$self_user}' and user_tag2 = '{$to_user}')or(user_tag1 = '{$to_user}' and user_tag2 = '{$self_user}') 
    order by date_menssage asc;";

    $res = $conn->query($sql);
    $num_rows = $res->num_rows;

    if($num_rows > 0){
        while($row = $res->fetch_object()){
            $to_user_sql = $row->user_tag2;
            $self_user_sql = $row->user_tag1;
            if($to_user_sql == $self_user && $self_user_sql == $to_user){
                echo '<div class="user_menssage">
                <h6 class="date_text normal_text">'.convert_date($row->date_menssage).'</h6>
                <h4 class="menssage_text normal_text">'.$row->menssage.'</h4>
                </div>';

            }elseif($to_user_sql == $to_user && $self_user_sql == $self_user){
                echo '<div class="self_menssage">
                    <h6 class="date_text normal_text">'.convert_date($row->date_menssage).'</h6>
                    <h4 class="menssage_text normal_text">'.$row->menssage.'</h4>
                    </div>';
            }else{
                 echo '<h3>erro</h3>';
            }
        }
    }else{
        echo '<h3>there are no menssages.</h3>';
    }

?>