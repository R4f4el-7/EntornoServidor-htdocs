<!DOCTYPE html>
<html>
    <?php
    $var1 = 100;
    $var2 = &$var1;
    $var3 = $var1;
    echo "$var2<br>";
    $var1 = 300;
    echo "$var2<br>";
    echo "$var1<br>";
    $var3 = 400;
    echo $var1;
    ?>
</html>