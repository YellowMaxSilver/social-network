<?php
       
    //   function sql_add_follow(){
    //     global $conn;
    //     $self_tag_name = '@mr_hello';
    //     $read_follow = "select * from user_account where tag_name = '{$self_tag_name}'";

    //     $res_1 = $conn->query($read_follow);
    //     $num_linhas_1 = $res_1->num_rows;

    //     if($num_linhas_1 > 0){
    //     $row = $res_1->fetch_object();
    //     $num_followers = $row->followers;
    //     $new_followers = $num_followers + 1;
    //     echo $num_followers;
    //     $write_followers = "update user_account 
    //     set followers = {$new_followers} where tag_name = '{$self_tag_name}';"; 
    //     $res_1 = $conn->query($write_followers);  
    //     }

        
    //   }
    //   if (isset($_POST['execute'])) {
    //     sql_add_follow();
    //   }
    function knowing_image($user_icon){
        if($user_icon != NULL){
            $link_icon_image =  './accounts_icons/'.$user_icon;
         }
         else{
          $link_icon_image =  './icones/user_icon.png';  
         }
         return $link_icon_image;   
    }


    
    function convert_date($potion1){
        $year = substr($potion1, 0, 4);
        $mouth = substr($potion1, 5,2);
        $day = substr($potion1, 8, 2);

        $hour = substr($potion1, 11,2);
        $minutes = substr($potion1, 14,2);
        
        date_default_timezone_set('America/Sao_Paulo');

        //  $year = 2024;
        //  $mouth = 8;
        //  $day = 15;
        //  $hour = 4;
        //  $minutes = 1;


        $now_year = date('Y');
        $now_mouth = date('m');
        $now_day = date('d');

        $now_hour = date('H');
        $now_minutes = date('i');

        $som_year = $now_year - $year;
        $som_mouth = $now_mouth - $mouth;
        $som_day = $now_day - $day;

        $som_hour = $now_hour - $hour;
        $som_minutes = $now_minutes - $minutes;





        // $status = $som_year.'/'.$som_mouth.'/'.$som_day;

        if($som_minutes > 0){
            $status_minutes_bool = 'ok';//it has his 1day aniversary day noraml
        }elseif($som_minutes < 0){
            $status_minutes_bool = 'noit'; //it dosent have his 1 day aniversary -1day
        }elseif($som_minutes == 0){
            $status_minutes_bool = 'ok';
        }

        if($som_hour > 0){
            $status_hour_bool = 'ok';//it has his 1day aniversary day noraml
        }elseif($som_hour < 0){
            $status_hour_bool = 'noit'; //it dosent have his 1 day aniversary -1day
        }elseif($som_hour == 0){
            //check minutes
            if($status_minutes_bool == 'ok'){
                $status_hour_bool = 'ok';
            }elseif($status_minutes_bool == 'noit'){
                $status_hour_bool = 'noit';  
            }
        }

        if($som_day > 0){
            $status_day_bool = 'ok';//it have his aniversary;
        }elseif($som_day < 0){
            $status_day_bool = 'noit';//it dont had your aniversary; mouth-1
        }elseif($som_day == 0){
            if($status_hour_bool == 'ok'){
                $status_day_bool = 'ok';
            }elseif($status_hour_bool == 'noit'){
                $status_day_bool = 'noit';
            }
        }

        if($som_mouth > 0){
            $status_mouth_bool = 'ok';//it have his aniversary; before
        }elseif($som_mouth < 0){
            $status_mouth_bool = 'noit';//it dont had your aniversary; year-1 after
        }elseif($som_mouth == 0){
            //check if the day is aniversary or not
            if($status_day_bool == 'ok'){
                $status_mouth_bool = 'ok';
            }else{
                $status_mouth_bool = 'noit';
            }

        }
        // 1 3 5 7 8 10 12
        // if(($mouth-1) == (1 || 3 || 5 || 7 || 8 || 10 || 12)){
        //     $day_of_mouth = 31;
        // }else{
        //     $day_of_mouth = 31;
        // }




        if($som_year == 0){
            //only show mouths, days, hours ou minutes
            //impossible noit, if there is it,it is wrong 
            if($status_mouth_bool == 'ok' && $status_day_bool == 'ok' && $som_mouth != 0){
                //there are more of one mouth
                //show only mouths
                $status = $som_mouth.' mouths ago';
            }
            elseif($status_mouth_bool == 'ok' && $status_day_bool == 'noit'){
                //show only mouths -1 max 11mouths
                if(($som_mouth-1) == 0 && ((30 - $day)+$now_day) < 30 && $status_hour_bool == 'ok'){
                    //show only days
                    $status = ((30 - $day)+$now_day).' days ago';
                }elseif(($som_mouth-1) == 0 && ((30 - $day)+$now_day) < 30 && $status_hour_bool == 'noit'){
                    //show only days -1 because it dosent have 1 day aniversary
                    $status = (((30 - $day)+$now_day)-1).' days ago';

                }elseif(($som_mouth-1) == 0 && ((30 - $day)+$now_day) == 30  && $status_hour_bool == 'ok'){
                    $status = '1 mouth ago';

                }elseif(($som_mouth-1) == 0 && ((30 - $day)+$now_day) == 30  && $status_hour_bool == 'noit'){
                    $status = (((30 - $day)+$now_day)-1).' days ago';

                }
                else{
                    $status = ($som_mouth-1).' mouths ago';
                }

            }
            elseif($som_mouth == 0 && $status_day_bool == 'ok' && $status_hour_bool == 'ok' && $som_day != 0){
                //show only days
                $status = $som_day.' days ago'; 
            }elseif($som_mouth == 0 && $status_day_bool == 'ok' && $status_hour_bool == 'noit' && ($som_day-1) != 0){
                //show only days -1 max 29
                $status = ($som_day-1).' days ago';

            }elseif($som_mouth == 0 && $status_day_bool == 'ok' && $status_hour_bool == 'noit' && ($som_day-1) == 0){
                //show only hours max 23
                $status = ((24-$hour)+$now_hour).' hours ago';
            }
            elseif($som_mouth == 0 && $som_day == 0 && $status_hour_bool == 'ok' && $som_hour != 0){
                //show only hours
                if(($now_hour - $hour) != 1 && $status_minutes_bool == 'ok'){
                    $status = $som_hour.' hours ago';
                }else{
                    $status = $som_hour.' hours ago';
                }
            }elseif($som_mouth == 0 && $som_day == 0 && $som_hour == 0  && $som_minutes != 0 && $status_minutes_bool == 'ok'){
                //show only minutes
                $status = $som_minutes.' minutes ago';
            }
            elseif($som_mouth == 0 && $som_day == 0 && $som_hour == 0 && $som_minutes == 0){
                //right now
                $status = 'right now';
            }
            if($som_mouth == 0 && $som_day == 0 && $som_hour == 1  && (60-$minutes)+$now_minutes < 60){
                $status = (60-$minutes)+$now_minutes.' minutes ago';
            }


        }elseif($som_year > 0){
            //only show years or mouths
            if($status_mouth_bool == 'ok'){
                //show only years
                $status = $som_year.' years ago';

            }elseif($status_mouth_bool == 'noit' && $som_year < 2 && $status_day_bool == 'ok'){
                //show only mouths until 11 mouths
                $status = (12 - $mouth)+$now_mouth.' mouths ago';

            }elseif($status_mouth_bool == 'noit' && $som_year < 2 && $status_day_bool == 'noit'){
                //show only mouths - 1 max 11 mouths
                $status = (((12 - $mouth)+$now_mouth)-1).' mouths ago';

            }elseif($status_mouth_bool == 'noit' && $som_year > 1){
                //shoy years -1
                $status = ($som_year-1).' years ago';
            }
        }

        



        return $status.'|'.$year.'/'.$mouth.'/'.$day.'--'.$hour.':'.$minutes;  
        // return $som_hour.'/'.$som_minutes.'/'.$status_minutes_bool.'/'.$status;    
    }
?>