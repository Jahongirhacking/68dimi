var bool=true;
var lead=document.getElementById("lead");
var lb=document.getElementById("leaderboard");
var md=document.getElementById("main-data")
document.getElementById("footer").style.width=(lb.offsetWidth)+"px";
//document.getElementById("body").offsetWidth
var body=document.getElementById("body");


document.getElementById("leader-shadow").style.width=lb.offsetWidth+"px";

        setTimeout(function(){ 
        
                lb.style.left="0px";
                document.getElementById("leader-shadow").style.left="0px";

                
        }, 1000);
        
function animated(){
    if(bool){
        lead.style.visibility="hidden";
        lb.style.left="-"+(lb.offsetWidth-170)+"px";
        document.getElementById("leader-shadow").style.left="-"+(lb.offsetWidth-170)+"px";
        if(body.offsetWidth>=1600){
            md.style.padding="20px 20px 60px 390px";
        }else{
            md.style.padding="20px 20px 60px 210px";            
        }
        document.getElementById("footer").style.width="170px";
        bool=false;
    }else{
        lead.style.visibility="visible";
        lb.style.left="0px";
        document.getElementById("leader-shadow").style.left="0px";
        if(body.offsetWidth>=1600){
            md.style.padding="20px 20px 60px 500px";
        }else{
            md.style.padding="20px 20px 60px 300px";            
        }
        document.getElementById("footer").style.width=(lb.offsetWidth)+"px";
        bool=true;
    }
    
    document.getElementById("leader-shadow").style.width=lb.offsetWidth+"px";
    
}

setInterval(onoff,1000);
var isSet=true;
function onoff(){
    if(isSet){
        document.getElementById("beta").style.color="yellow";
        isSet=false;
    }else{
        document.getElementById("beta").style.color="#eee";
        isSet=true;
    }
}




$(document).ready(function(){
init();
setInterval(init,70000);
                        
                        
function init() {

    //Agar muddati tugasa kodni almashtir xo'pmi
    var url="http://api.weatherstack.com/current?access_key=3a0af01fc2ab223e6b5b815bf9bdbdcb&query=Tashkent";
    var data='';
    //***************************************************************
                                        
    $.get(url,function(data) {
                        
       image=data.current.weather_icons;
                        
       $("#weather-img").attr("src",image);				
                        
       data1=data.current.temperature+"°C";
                        
                        
       document.getElementById('degree').innerHTML=data1;
                                                
                                                
       //http://restcountries.eu/rest/v2/all
                                                
       })
    }
})


function footerOff(){
    document.getElementById("footer").style.visibility="hidden";
}

function footerOn(){
    document.getElementById("footer").style.visibility="visible";
}

function loading(){
    document.getElementById('test-button-container').innerHTML="<i class='fa fa-spinner fa-spin'></i>";
}

//Oyna yopilganini tekshirish

function telegram(id){
    $.post("../telegram/php/another_user.php", {another_user_id:id},
        function(data){
            location.href="../telegram/main/";
        }
    
    )
}
