/*5. Crear una función llamada int mayorNumero (int a, int b)
 que reciba dos
números reales por parámetro y devuelva el número mayor.*/
package com.infantaelena;

import java.util.Scanner;

public class estructuraif_5_mayornumero {

	public static void main(String[] args) {
		
		Scanner sc = new Scanner(System.in);
		int num1, num2;
		
		System.out.println("Introduce el valor de num1: ");
		num1 = sc.nextInt();
		
		System.out.println("Introduce el valor de num2: ");
		num2 = sc.nextInt();
		
		if (mayornumero(num1,num2) == num1) {
			
			System.out.println(num1+" es el mayor");
			
		}else {
			
			System.out.println(num2+" es el mayor");
			
		}
		sc.close();

	}
	static int mayornumero(int a, int b) {
		
		if (a > b) {
			
			return a;
			
		}else {
			
			return b;
			
		}
	}

}
