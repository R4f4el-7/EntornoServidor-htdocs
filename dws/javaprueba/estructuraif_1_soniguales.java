/*1. Crear una función llamada boolean sonIguales (int a, int b) que reciba dos
números por parámetro y devuelva true si son iguales o false en caso
contrario*/
package com.infantaelena;

import java.util.Scanner;

public class estructuraif_1_soniguales {

	public static void main(String[] args) {
		 
		Scanner sc = new Scanner(System.in);
		int num1, num2;
		
		System.out.println("Introduce el valor para num1: ");
		num1 = sc.nextInt();
		System.out.println("Introduce el valor para num2: ");
		num2 = sc.nextInt();
		
		if (soniguales(num1,num2)) {

			System.out.println("Es igual");

		}else {
			
			System.out.println("No son iguales");
			
		}
	
		sc.close();
	}
	static boolean soniguales(int a, int b) {
		
		if (a == b) {
			return true;
		}else{
			return false;
		}
	}

}
