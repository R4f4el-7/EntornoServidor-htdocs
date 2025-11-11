/*6. Crear un procedimiento llamado String ordenarNumeros (int a, int b, int c)
que reciba tres números por parámetro y devuelva un String con los
números ordenados de mayor a menor Ej ordenarNumeros(5,23,7)
devolvería “23 7 5”.
*/
package com.infantaelena;

import java.util.Scanner;

public class estructuraif_6_ordenarnumeros {
	
	public static void main(String[] args) {
	
		Scanner sc = new Scanner(System.in);
		int num1, num2, num3;
		
		System.out.println("Introduce un valor a num1: ");
		num1 = sc.nextInt();
		
		System.out.println("Introduce un valor a num2: ");
		num2 = sc.nextInt();
		
		System.out.println("Introduce un valor a num3: ");
		num3 = sc.nextInt();
		
		System.out.println(ordenarnumeros(num1,num2,num3));
		sc.close();
	}
	static String ordenarnumeros(int a, int b, int c) {
		
		
		
		if ((a > b)&&(a > c)) {
			if (b > c) {
				
				return a+" ,"+b+", "+c;
				
			}else {
				
				return a+" ,"+c+", "+b;
				
			}
		}else if ((b > a)&&(b > c)) {
			if (a > c) {

				return b+" ,"+a+", "+c;
				
			}else {
				
				return b+" ,"+c+", "+a;
				
			}
		}else if ((c > a)&&(c > b)) {
			if (a > b) {
				
				return c+" ,"+a+", "+b;
				
			}else {
				
				return c+" ,"+b+", "+a;
				
			}
		}
		return null;
	}
	
}


/*OPCION 1:
 * String orden1, orden2, orden3, orden4, orden5, orden6;

if ((a > b)&&(a > c)) {
	if (b > c) {
		
		orden1 = a+" ,"+b+", "+c;
		return orden1;
		
	}else {
		
		orden2 = a+" ,"+c+", "+b;
		return orden2;
		
	}
}else if ((b > a)&&(b > c)) {
	if (a > c) {

		orden3 = b+" ,"+a+", "+c;
		return orden3;
		
	}else {
		
		orden4 = b+" ,"+c+", "+a;
		return orden4;
		
	}
}else if ((c > a)&&(c > b)) {
	if (a > b) {
		
		orden5 = c+" ,"+a+", "+b;
		return orden5;
		
	}else {
		
		orden6 = c+" ,"+b+", "+a;
		return orden6;
		
	}
}

OPCION 2:
String orden1 = a+" ,"+b+", "+c, orden2 = a+" ,"+c+", "+b, orden3 = b+" ,"+a+", "+c, orden4 = b+" ,"+c+", "+a, orden5 = c+" ,"+a+", "+b, orden6 = c+" ,"+b+", "+a;

if ((a > b)&&(a > c)) {
	if (b > c) {
		
		return orden1;
		
	}else {
		
		
		return orden2;
		
	}
}else if ((b > a)&&(b > c)) {
	if (a > c) {

		
		return orden3;
		
	}else {
		
		
		return orden4;
		
	}
}else if ((c > a)&&(c > b)) {
	if (a > b) {
		
		
		return orden5;
		
	}else {
		
		
		return orden6;
		
	}
}

OPCION 3:
String orden;

if ((a > b)&&(a > c)) {
	if (b > c) {
		
		orden = a+" ,"+b+", "+c;
		
	}else {
		
		orden = a+" ,"+c+", "+b;
		
	}
}else if ((b > a)&&(b > c)) {
	if (a > c) {

		orden = b+" ,"+a+", "+c;
		
	}else {
		
		orden = b+" ,"+c+", "+a;
		
	}
}else if ((c > a)&&(c > b)) {
	if (a > b) {
		
		orden = c+" ,"+a+", "+b;
		
	}else {
		
		orden = c+" ,"+b+", "+a;
		
	}
}
return orden;*/

