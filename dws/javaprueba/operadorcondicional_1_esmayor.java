/*1. Escribir una función llamada int esMayor (int a, int b) que recibe dos
números A y B e y devuelva utilizando el operador condicional el mayor
de los dos.*/
package com.infantaelena;

import java.util.Scanner;

public class operadorcondicional_1_esmayor {

	public static void main(String[] args) {

		Scanner sc = new Scanner(System.in);
		int num1, num2;
		
		System.out.println("Introduce el valor de num1: ");
		num1 = sc.nextInt();
		System.out.println("Introduce el valor de num2: ");
		num2 = sc.nextInt();
		
		System.out.println(esmayor(num1,num2));
		sc.close();
	}
	static int esmayor(int a, int b) {
		
		int mayor = (a > b) ? a : (b > a) ? b : -1;
		return mayor;
	}
}
