<?php
function comprobarCookies()
{
$activas = false;
if( isset($_COOKIE['‘nombre']))
$activas = true;
return $activas;
}
if( comprobarCookies() == true )
echo("Las Cookies están activas");
else
echo "Las Cookies están desactivadas";
?>