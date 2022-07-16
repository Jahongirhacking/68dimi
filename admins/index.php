<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin bo'limi</title>
    <link rel="stylesheet" href="./style/style_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="https://www.onlygfx.com/wp-content/uploads/2020/07/blank-post-it-note-1.png">
</head>
<body>

<div class="container">

<i class="fa fa-frown-o" id="sad" aria-hidden="true" style="visibility:hidden;"></i>

<table cellpadding="10px" cellspacing=0 border=2px id="data_table" style="visibility:hidden;">
<tr id="post"><td colspan="9"><a href="./create_post/"><p>Post Yaratish</p></a></td></tr>
<tr>
<th>ID</th>
<th>Ism</th>
<th>Familiya</th>
<th>Onlayn</th>
<th>Ochko</th>
<th>Sana</th>
<th>Telefon</th>
<th>Sinf</th>
<th>Login</th>
<th>Kiroladi</th></tr> 

<?php

$dbServerName="fdb30.awardspace.net";
$dbUserName="3717817_jahongirhacking";
$dbPassword="Jahongir";
$dbName="3717817_jahongirhacking";
    
$conn=new mysqli($dbServerName,$dbUserName,$dbPassword,$dbName) or die("Ulanib bo'lmadi!");
    

//JSON fayl yaratish

$sql="SELECT Ism,Familiya,Tugilgan_sana,Telefon,Ochko,Sinf,Login,isKirish,last_time FROM forma ORDER BY last_time DESC;";
$result=mysqli_query($conn, $sql);

$resultCheck=mysqli_num_rows($result);

$json_array=array();
if($resultCheck>0){
    while($row=mysqli_fetch_assoc($result)){
        $json_array[]=$row;
    }
}

$json_array=json_encode($json_array);
   
$data=json_decode($json_array,true);


//Iteratsiya

$kirish_sana=0;
$array_length=count($data);
for($i=0; $i<$array_length; $i++){
    $Ism=$data[$i]['Ism'];
    $Familiya=$data[$i]['Familiya'];
    ////////
    $last_time=$data[$i]['last_time'];
    if($last_time=="0"){
        $when="Kirmagan";
    }else{
        $when=date("d-m",$last_time)." ".(date("H",$last_time)+5).":".date("i",$last_time); //qachon onlayn
    }
    $sana=$data[$i]['Tugilgan_sana'];
    $telefon=$data[$i]['Telefon'];
    $ochko=$data[$i]['Ochko'];
    $maktab=$data[$i]['Maktab'];
    $sinf=$data[$i]['Sinf'];
    $login=$data[$i]['Login'];

    if($data[$i]['isKirish']){
        $isKirish="Ha";
        $kirish_sana++;
    } else{
        $isKirish="Yoq";
    };

    echo "<tr class=".strtolower($isKirish).">
    <td>".($i+1)."</td>
    <td>$Ism</td>
    <td>$Familiya</td>
    <td>$when</td>
    <td>$ochko XP</td>
    <td>$sana</td>
    <td>$telefon</td>
    <td>$sinf</td>
    <td>$login</td>
    <td>$isKirish</td>
    </tr>";
}

echo "<tr class=\"bg-black\"><td colspan=\"9\"></td></tr>
    <tr class=\"bg-blue\">`
    <td colspan=5>Jami ro'yxatdan o'tganlar soni <i class=\"fa fa-address-card\" aria-hidden=\"true\"></i></td>
    <td colspan=4>Kirishga ruxsat berilganlar soni <i class=\"fa fa-check-square\" aria-hidden=\"true\"></i></td>
    </tr>

    <tr class=\"bg-blue\">
    <td colspan=5>$array_length ta</td>
    <td colspan=4>$kirish_sana ta</td>
    </tr>
    </table>
";

$result_parol=mysqli_query($conn,"SELECT parol FROM admin_parol;");
$row=mysqli_fetch_assoc($result_parol);
$admin_parol=$row["parol"];


echo "
</div>
</body>
<script>
let table=document.getElementById(\"data_table\");
let sad=document.getElementById(\"sad\");
let javob=prompt(\"Adminligingizni tasdiqlang!\");
//Tasdiqla
if(javob==\"$admin_parol\"){
    table.style.visibility=\"visible\";
}else{
    let arr_color=[\"#D8D110\",\"#1DD810\",\"#10D8D7\",\"#D8105B\"];
    sad.style.visibility=\"visible\";
    sad.style.color=arr_color[Math.floor(Math.random()*arr_color.length)];
}
</script>
</html>";

?>
