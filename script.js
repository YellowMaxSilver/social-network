
function alert_box(potion1,account,text){
    var alert_box = document.getElementById('alert_box');

    function whrite_box(menssage,image_url){
     return `<div style="display: flex;width:400px">
            <div style="background-image: url(`+image_url+`);width:50px;margin-left:20px;"></div>
            <h4 class="normal_text" id="alert_box_text">`+menssage+`</h4>
        </div>`;   
    }
    if(potion1 == 'send_comment'){
        alert_box.innerHTML = 
        whrite_box(
            menssage='Comment sent',
            image_url='./icones/comment_icon.png'
        );
    }

    else if(potion1 == 'donot_account'){
     alert_box.innerHTML = 
     whrite_box(
            menssage='You do not have an account',
            image_url='./icones/followers_icon.png'
        );
    }

    else if(potion1 == 'already_like'){
        alert_box.innerHTML = 
        whrite_box(
            menssage='You already liked this post',
            image_url='./icones/like_icon.png'
        );
    }

    else if(potion1 == 'like_post'){
        alert_box.innerHTML = 
        whrite_box(
            menssage='You Like this post',
            image_url='./icones/liked_icon.png'
        );
    }

    else if(potion1 == 'menssage'){
        alert_box.innerHTML = 
        whrite_box(
            menssage='haha vai pagar meu hospital',
            image_url='./icones/liked_icon.png'
        );
    }


    alert_box.style = 'display:flex;';
    function hidden_alert_box(){
        document.getElementById('alert_box').style = 'display: none'  
    }
    var time = setTimeout(hidden_alert_box, 3500)
   }