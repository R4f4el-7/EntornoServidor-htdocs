<?php
    if( isset( $_COOKIE['lang']) )
    {
        //Actualizar cookie
        setcookie("lang", $_COOKIE['lang'], time() + (6000), "/");
    }
    else
    {
        //Valor por defecto
        setcookie("lang", 'esp', time() + (6000),"/" );
    }
?>
