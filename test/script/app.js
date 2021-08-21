var checks=document.getElementsByClassName("check");
function check(index){
    for(let i=Math.floor(index/4)*4;i<Math.floor(index/4)*4+4;i++){
        if(i!=index){
            checks[i].checked=false;
        }
    }

}

//tugmani yo'qot va hisobla
function answer(){
        
    document.getElementById('test-button-container').innerHTML="<i style=font-size:22pt class='fa fa-spinner fa-spin green'></i>";    
        
    var arr=[];
    for(let i=0; i<20; i++){
        isChecked=false;
        for(let j=i*4; j<i*4+4; j++){
            if(checks[j].checked){
                isChecked=true;
                arr.push(checks[j].value);
            }
        }
        if(!isChecked){
            arr.push("X");
        }
    }

    
    var arr_valid=document.getElementById("correct").value.split(", ");
    arr_valid.pop();
    
    //NT
    var score=0
    
    for(let i=0; i<arr_valid.length; i++){
        if(arr_valid[i]==arr[i]){
            score+=1;
        }
    }
        
     
    document.getElementById("form").innerHTML="<input name=\"correct\" id=\"correct\" type=\"text\" value=\""+score+"\">";
    
    
    
  
  
    var user_ism=document.getElementById("ism").innerHTML;
    
    
    
    $.post("./php/index.php", {ochko:score},
        function(data){
            document.write(data);
            alert(`Tabriklayman siz ${score*10} XP ishladingiz!\nEndi Kabinetingizga o'tishingiz mumkin `+user_ism);
        }
    
    )
    
    document.getElementById("kabinet").style.display="block";

}



var limit_min=30;
var limit_sec=limit_min*60;
var min,sec,fullTime;

var forTime = setInterval(getTime, 1000);

function getTime(){
    
    limit_sec-=1;
    min=Math.floor(limit_sec/60);
    sec=limit_sec%60;
    
    let valid_min=nolquy(min);
    let valid_sec=nolquy(sec);
    
    let fullTime=valid_min+" : "+valid_sec;
    document.getElementById("left-time").innerHTML=fullTime;
    if(min==0 && sec==0){
        clearInterval(forTime);
        answer();
    }

}

function nolquy(num){
    if(num<10){
        num="0"+num;
    }
    return String(num);
}


