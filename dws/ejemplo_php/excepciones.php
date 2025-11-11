<?php
    function dividir($a, $b){
        if($b == 0){
            throw new Exception('El segundo argumento es 0');
        }
        return $a/$b;
    }
    try{
        $result1 = dividir(5,0);
        echo "resultado 1 $result1". "<br>";
    }catch(Exception $e){
        echo "exception: ".  $e->getMessage(). "<br>";
    }finally{
        echo "Primer finally<br>";
    }
    try{
        $result2 = dividir(5,2);
        echo "resultado 2 $result2". "<br>";
    }catch(Exception $e){
        echo "exception: ".  $e->getMessage(). "<br>";
    }finally{
        echo "Segundo finally<br>";
    }
?>