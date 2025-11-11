/*Crea dos arrays unidimensionales que tengan el mismo tamaño (lo pedirá por teclado),
en uno de ellos almacenarás nombres de personas como cadenas, en el otro array irás
almacenando la longitud de los nombres, para ello puedes usar la función
LONGITUD(cadena) que viene en PseInt. Muestra por pantalla el nombre y la longitud
que tiene. */
package com.infantaelena;

import java.util.Scanner;

public class arrays_6_metodolength {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		int tama;
		
		System.out.println("Introduce el tamaño del arrays: ");
		tama = sc.nextInt();
			
		String[] nombre = new String[tama];
		int[] longitud_nombre = new int[tama];

		rellenar(nombre,longitud_nombre);
		mostrar(nombre,longitud_nombre);
		
	}
	
	static void rellenar(String[] nombre, int[] longitud_nombre) {
		
		for (int i = 0; i < nombre.length; i++) {
			
			System.out.println("Introduce el nombre "+i);
			nombre[i] = sc.next();
		
		}
		for (int i = 0; i < longitud_nombre.length; i++) {
			
			longitud_nombre[i] = nombre[i].length();
		}
	}
	
	static void mostrar(String[] nombre, int[] longitud_nombre) {
		
		for (int i = 0; i < nombre.length; i++) {
			
			System.out.print(nombre[i]+" ");
		}
		System.out.println();
		for (int i = 0; i < longitud_nombre.length; i++) {
			
			System.out.print(longitud_nombre[i]+" ");
		}
	}

}