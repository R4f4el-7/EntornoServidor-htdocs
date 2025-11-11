/*. Programa Java que lea 10 números enteros por teclado y los guarde en un array.
Calcula y muestra la media de los números que estén en las posiciones pares del array.
Considera la primera posición del array (posición 0) como par*/
package com.infantaelena;

import java.util.Scanner;

public class arrays_9_posicionespar {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		int[] media_par = new int[10];
		
		media(media_par);
	}
	
	static void media(int[] media_par) {
		
		int suma = 0, media = 0, contador_pares = 0;
		
		for (int i = 0; i < media_par.length; i++) {
			
			System.out.println("Introduzca el valor en la posicion "+i);
			media_par[i] = sc.nextInt();
			
			if ((i % 2 == 0)||(i == 0)) {
				suma = suma + media_par[i];
				contador_pares = contador_pares + 1;
			}
		}
		media = suma / contador_pares;
		System.out.println("La media en la posiciones pares es: "+media);
	}

}
