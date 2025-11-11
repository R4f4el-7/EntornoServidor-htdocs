/*3.- Ahorcado
Crea un programa para implementar el juego del ahorcado.
Un jugador selecciona una palabra y el otro trata de adivinar la palabra acertando letras
individuales.
Almacena la lista de palabras en un array y selecciónalas aleatoriamente.*/

package com.infantaelena;

import java.util.Scanner;

public class StringAmpli_3_ahorcado {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		String[] lista = new String[3];
		String palabra, palabra_select;
		
		//rellenar lista de palabras
		
		for (int i = 0; i < lista.length; i++) {
			System.out.println("Introduce la palabra "+(i+1)+": ");
			palabra = sc.nextLine();
			palabra = palabra.toLowerCase();
			lista[i] = palabra;
		}
		
		//mostrar
		
		for (int i = 0; i < lista.length; i++) {
			System.out.print(lista[i]+" ");
		}
		System.out.println();
		
		System.out.println("Selecciona una palabra de la lista: ");
		palabra_select = sc.nextLine();
		
		//palabra_select coincide con alguna de la lista de palabras
		
		for (int i = 0; i < lista.length; i++) {
			if (palabra_select.equals(lista[i])) {
				System.out.println("coincide");
			}
		}
		
		//adivina palabra seleccionada
		
		char letra;
		
		System.out.println("Introduzca letra: ");
		letra = sc.next().charAt(0);
		
		
		for (int i = 0; i < palabra_select.length(); i++) {
			if (letra == palabra_select.charAt(i)) {
				System.out.println("Correcto. La palabra contiene la letra "+letra);
			}
		}
		
		
	}

}
