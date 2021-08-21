var str_rand=[];
var num_rand=[1,2,3,4,5,6,7,8,9,0];
code="";
var log=console.log;

for(let i=65; i<=90; i++){
    str_rand.push(String.fromCharCode(i));
}

for(let i=97; i<=122; i++){
    str_rand.push(String.fromCharCode(i));
}

function rand(elem){
    code+=elem[Math.floor(Math.random()*elem.length)]
}

function random_code(){
    for(let i=0; i<6; i++){
        rand(str_rand);
    }
    for(let i=0; i<4; i++){
        rand(num_rand);
    }
}

random_code()
document.getElementById("code").value=code;


isHidden=false;
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