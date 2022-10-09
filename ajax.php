<?php
    if(array_key_exists("update", $_POST)){
        echo "<iframe id='calendarioGoogle' class='col-xl-12 col-lg-12' src='". $_POST["update"]."' style='border: 0' width='800' height='600' frameborder='0' scrolling='no'></iframe>";
    }
?>
