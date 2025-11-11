 <?php
 echo PHP_INT_SIZE."<br>";
 echo PHP_INT_MIN."<br>";
 echo PHP_INT_MAX."<br>";

 $a = 0b100; // en binario
 echo $a." binario <br>";
 $a = 0100; // octal
 echo $a." octal <br>";
 $a = 0xa; // hexadecimal
 echo $a." hexadecimal <br>";
 $a = 3/2; // la división entre enteros no da problemas
 echo $a."<br>"; // 1.5
 
 $b = 7.5;
 $a = (int)$b; //casting a int
 echo $a."<br>"; // 7, se trunca
 
 $b = 7e2; // notación científica
 echo $b."<br>";
 $b = 7E2;
 echo $b."<br>";
 ?>