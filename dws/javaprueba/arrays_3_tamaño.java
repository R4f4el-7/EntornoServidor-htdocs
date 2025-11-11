/*3. Pedir por teclado el tamaño de un array de números y pedir los valores numéricos con
los que se rellena. Los valores no se pueden repetir. Mostrar el array con los valores al
final.*/
package com.infantaelena;

import java.util.Scanner;

public class arrays_3_tamaño {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		int tama;
		
		System.out.println("Introduce el tamaño del arrays: ");
		tama = sc.nextInt();
		
		int[] numeros = new int[tama];
		
		rellenar_array(numeros);
		mostrar(numeros);
	}
	static void rellenar_array(int[] num) {
		
		for (int i = 0; i < num.length; i++) {
			
			System.out.println("Introduce el valor del array en la posicion "+i);
			num[i] = sc.nextInt();
			
			
		}
	}
	static void mostrar(int[] num) {
		
		for (int i = 0; i < num.length; i++) {
			
			System.out.println(num[i]);
		}
	}

}
