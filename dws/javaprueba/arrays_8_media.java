/*Usando arrays crea un programa en Java que calcule la media de una serie de números
que se leen por teclado.*/
package com.infantaelena;

import java.util.Scanner;

public class arrays_8_media {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		int tama;
		
		System.out.println("Introduce el tamaño del arrays: ");
		tama = sc.nextInt();
		
		int[] numero = new int[tama];
		
		media(numero);
	}
	static void media(int[] num) {
		
		int suma = 0, media_ = 0;
		
		for (int i = 0; i < num.length; i++) {
			
			System.out.println("Introduzca el valor de la posicion: "+i);
			num[i] = sc.nextInt();
			
			suma = suma + num[i];
		}
		
		media_ = suma / num.length;
		
		System.out.println("La media es: "+media_);
	}

}
