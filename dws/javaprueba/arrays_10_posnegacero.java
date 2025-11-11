/*3. Programa Java que guarda en un array 10 números enteros que se leen por
teclado. A continuación, se recorre el array y calcula cuántos números son
positivos, cuántos negativos y cuántos ceros.*/
package com.infantaelena;

import java.util.Scanner;

public class arrays_10_posnegacero {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		int[] numero = new int[4];
		
		rellenar(numero);
		contador(numero);
		
	}
	static void rellenar(int[] num) {
		
		for (int i = 0; i < num.length; i++) {
			
			System.out.println("Introduzca el valor en la posicion "+i);
			num[i] = sc.nextInt();
			
		}
	}
	static void contador(int[] num) {
		
		int contador_pos = 0, contador_nega = 0, contador_0 = 0;
		
		for (int i = 0; i < num.length; i++) {
			
			if (num[i] > 0) {
				
				contador_pos = contador_pos + 1;
			
			}else if (num[i] < 0) {
			
				contador_nega = contador_nega +1;
				
			}else {
				contador_0 = contador_0 + 1;
			}
		}
		System.out.println("Hay "+contador_pos+" de numeros positivos");
		System.out.println("Hay "+contador_nega+" de numeros negativos");
		System.out.println("Hay "+contador_0+" de numeros que son cero");
	}

}
