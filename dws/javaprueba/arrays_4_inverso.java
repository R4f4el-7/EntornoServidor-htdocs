/*4. Leer 5 números y mostrarlos en orden inverso al introducido.
*/
package com.infantaelena;

import java.util.Scanner;

public class arrays_4_inverso {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		int[] numero = new int[5];
		
		rellenar(numero);
		mostrar_invertido(numero);
	}
	static void rellenar(int[] num) {
		
		for (int i = 0; i < num.length; i++) {
			
			System.out.println("Introduce el valor de la posicion: "+i);
			num[i] = sc.nextInt();
		}
		
	}
	static void mostrar_invertido(int[] num) {
		
		for (int i = num.length-1; i >= 0; i--) {
			
			System.out.println(num[i]);
		}
	}

}