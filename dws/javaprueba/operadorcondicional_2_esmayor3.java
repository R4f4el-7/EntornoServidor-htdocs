/*2. Escribir una función llamada int esMayor(int a, int b, int c) que recibe tres
números A, B y C e y devuelva utilizando el operador condicional el mayor
de los tres.*/
package com.infantaelena;

import java.util.Scanner;

public class operadorcondicional_2_esmayor3 {

	public static void main(String[] args) {
		
		Scanner sc = new Scanner(System.in);
		int num1, num2, num3;
		
		System.out.println("Introduce el valor de num1: ");
		num1 = sc.nextInt();
		System.out.println("Introduce el valor de num2: ");
		num2 = sc.nextInt();
		System.out.println("Introduce el valor de num3: ");
		num3 = sc.nextInt();
		
		System.out.println(esmayor(num1,num2,num3));
		sc.close();
	}
	static int esmayor(int a, int b, int c) {
		
		int mayor = (a > b)&&(a > c) ? a : (b > a)&&(b > c) ? b : (c > b)&&(c > a) ? c : -1;
		return mayor;
		
	}
}
