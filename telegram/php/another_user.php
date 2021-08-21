<?php

session_start();
    
    //User jo'natgan xabar
    $another_user_id=$_POST["another_user_id"];
    $_SESSION["another_user_id"]=$another_user_id;
    
    echo "muvaffaqiyatli";

?>