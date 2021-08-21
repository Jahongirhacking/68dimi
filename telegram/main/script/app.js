var chatSection=document.getElementById("chat-section"); //Chat polyasi
var myMessages=document.getElementsByClassName("my-message"); //Men jo'natgan xabarlar
var yourMessages=document.getElementsByClassName("your-message"); //Sen jo'natgan 
var log=console.log;
var oldingiLink;


function loadScript(){
    
    //oynani to'g'irlash
    chatSection.style.height=(window.innerHeight-document.getElementById("send-section").offsetHeight-document.getElementById("nav").offsetHeight-20)+"px"; //padding 10px bo'lgani uchun
    chatSection.style.marginTop=document.getElementById("nav").offsetHeight+"px";

    // 1ta satrda 2ta xabar bo'lmasligi uchun
    function marginTugirla(){
        //Men yozgan so'zlar 1 ta ustunda
        for(let i=0;i<myMessages.length;i+=1){
            myMessages[i].style.margin="5px 15px 5px "+(chatSection.offsetWidth-myMessages[i].offsetWidth-50)+"px";
        };
        //Sen yozgan so'zlar 1 ta ustunda
        for(let i=0;i<yourMessages.length;i+=1){
            yourMessages[i].style.margin="5px "+(chatSection.offsetWidth-yourMessages[i].offsetWidth-50)+"px 5px 15px";
        };
    }
    
    //Oxirgi xabarga o'tish
    
    
    marginTugirla();
    if(oldingiLink!=document.getElementsByClassName('messages').length){
        setTimeout(location.href="#"+document.getElementsByClassName('messages').length, 5000);
        oldingiLink=document.getElementsByClassName('messages').length;
    }
   
}

loadScript();
oldingiLink=document.getElementsByClassName('messages').length;
location.href="#"+oldingiLink;



setInterval(loadScript,5000); //Har 5 sekundda chaqirish

//Dark Mode
var isKun=false;
function tunKun(){
    if(isKun){
        document.getElementsByClassName("fa-moon")[0].className="fa fa-sun"
        document.getElementById("forStyle").innerHTML="";
        isKun=false;
    }else{
        
        document.getElementsByClassName("fa-sun")[0].className="fa fa-moon"; // Oymomo
        
            document.getElementById("forStyle").innerHTML=`
            <style>

            #nav{
                background-color: #009688!important;
            }
            #body{
                background-color: #afbe00;
            }
            #chat-section{
                background-color: #BDC7D0;
            }
            .messages{
                color: #040505;
                box-shadow: 0 0 10px #00000066;
            }
            .my-message{
                background-color: #B2DFDB!important;
            }
            .my-message>.chat-data{
                color: #1D9085;
            }
            .your-message{
                background-color: #eee!important;
            }
            .your-message>.chat-data{
                color: #9Fa7aE;
            }
            .kabinetga-link{
                background-color: #04a192!important;
            }


            </style>
            `;
        isKun=true;
    }
}

//Bazaga Xabar yuborish
function send(){
    var message=document.getElementById("sending-message").value;
    if(message!=""){
            
            $.post("./php/index.php", {message:message},
                function(data){
                    log("Bazaga "+data+" yuborildi");
                    document.getElementById("sending-message").value="";
                }
            
            )
    }
}

//Har doim yangilab turadi agar bazada o'zgarish bo'lsa
function chatYangila(){
            
            var lengthMessage=document.getElementsByClassName('messages').length;
            $.post("./php/yangila.php", {lengthMessage:lengthMessage},
                function(data){
                    if(data!=0){
                       chatSection.innerHTML=data;
                       loadScript();
                    }
                }
            
            )
}


setInterval(chatYangila,5000);

//User Onlinemi?
function updateUserStatus(){
    jQuery.ajax({
    url:'../../users/php/close.php',
    success:function(){
        //code...
        }
    });
}
setInterval(updateUserStatus,40000);
updateUserStatus();


