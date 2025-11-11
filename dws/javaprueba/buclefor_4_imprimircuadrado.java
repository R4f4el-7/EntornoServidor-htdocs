/*4. Implemente la función imprimirCuadrado (int n) que recibe un número
entero n y después de comprobar que es que igual o mayor que cero
imprimirá un cuadrado de n elementos con asteriscos utilizando dos for
Programación*/
package com.infantaelena;

import java.util.Scanner;

public class buclefor_4_imprimircuadrado {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		imprimircuadrado();
	}
	static void imprimircuadrado() {
		
		int tama;
		
		System.out.print("Introduzca el tamaño del cuadrado: ");
		tama = sc.nextInt();
		
		for (int i = 1; i <= tama; i++) {
			
			System.out.println();
			System.out.print("*");
			
			
			for (int j = 1; j < tama; j++) {
				
				System.out.print(" *");
				
			}
		}
	}

}
