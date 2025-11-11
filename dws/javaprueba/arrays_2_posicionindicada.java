/*2. Buscar un elemento dentro de un array que nosotros le pedimos por teclado. Indicar la
posición donde se encuentra. Si hay más de uno, indicar igualmente la posición.*/
package com.infantaelena;

import java.util.Scanner;

public class arrays_2_posicionindicada {
	
	static Scanner sc = new Scanner(System.in);

	public static void main(String[] args) {

		int[] numeros = new int[10];
		
		insertar_valor(numeros);
		
		posicion(numeros);
	
		
	}
	static void insertar_valor(int[] num) {
		
		for (int i = 0; i < num.length; i++) {
			
			System.out.println("Introduzca el valor a la posicion "+i);
			num[i] = sc.nextInt();
		}
		
	}
	static void posicion(int[] num) {
		
		int num1;
		
		System.out.println("Introduce el numero a buscar: ");
		num1 = sc.nextInt();
		
		for (int i = 0; i < num.length; i++) {

			if (num1 == num[i]) {
				System.out.println("El numero que busca se encuentra en la posicion "+i);
			}
			
		}
		
	}

}
