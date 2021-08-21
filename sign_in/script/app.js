

isHidden=true;
function hide(){
    if(isHidden){
        document.getElementById("code").type="text";
        document.getElementById("hide").innerHTML="<i class=\"fa fa-eye-slash\" aria-hidden=\"true\"></i>";
        isHidden=false;
    }else{
        document.getElementById("code").type="password";
        document.getElementById("hide").innerHTML="<i class=\"fa fa-eye\" aria-hidden=\"true\"></i>";
        isHidden=true;
    }
}


function mehmon(php,url){
    $.post(php, {ochko:true},
        function(data){
            location.href=url;

        }
    
    )
    }