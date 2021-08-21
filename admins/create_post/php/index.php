<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tekshirish</title>
    <link rel="stylesheet" href="../../../style/style_reg.css">
</head>
<body>

<?php

$server_name="fdb30.awardspace.net";
$user_name="3717817_jahongirhacking";
$user_pwd="Jahongir18052004";
$db_name="3717817_jahongirhacking";
    

$image=$_POST["image"];
$title=$_POST["title"];
$text=$_POST["text"];
$name=$_POST["name"];
$albom=$_POST["albom"];
$book=$_POST["book"];
$sana=date("d.m.Y",time());
if(isset($albom)){
    $orientation=$albom;
}else{
    $orientation=$book;
}

$conn=mysqli_connect($server_name,$user_name,$user_pwd,$db_name) or die("Ulanib bo'lmadi!");
$sql="INSERT INTO post(`image`, `title`, `text`, `name`, `orientation`, `sana`) VALUES (\"$image\",\"$title\",\"$text\",\"$name\",\"$orientation\",\"$sana\")";

if ($conn->query($sql) === TRUE) {
    echo "<div id=\"succes-alert\"><p style=\"margin-bottom:66px\">Post muvaffaqiyatli yaratildi va tez orada boshqalarga ko'rinadi!</p>
        <a href=\"../../\" class=\"button\" id=\"button\">Admen bo'limiga o'tish <i class=\"fa fa-user-circle-o in-button\" aria-hidden=\"true\"></i></a>
        ";


    


} else {
    echo "
    <div id=\"red-alert\">
    <p>Xatolik: Siz mumkin bo'lmagan belgilardan foydalangan bo'lishingiz mumkin.<br>
    <b>Masalan: #, $, &, \", ~ ... </b><br>
    Iltimos, Qayta post tayyorlayotganingizda iloji boricha bunday belgilardan foydalanmang!</p>
    <br>
    <a href=\"../\" class=\"button\" id=\"button\">Qaytadan <i class=\"fa fa-refresh in-button\" aria-hidden=\"true\"></i></a>
    ";
}


?>

</body>
</html>