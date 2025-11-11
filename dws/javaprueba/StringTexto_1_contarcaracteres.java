/*Escriba la función int contarCaracteresNoNumericos(String cadena) 
 * que recibe una cadena y devuelva cuántos caracteres no numéricos hay.*/
package com.infantaelena;

import java.util.Scanner;

public class StringTexto_1_contarcaracteres {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		String cadena;
		
		System.out.println("Introduce la cadena: ");
		cadena = sc.nextLine();
		
		System.out.println("Hay "+contarcaracteres(cadena));
	}
	public static int contarcaracteres(String cadena) {
		
		int contador = 0;
		
		for (int i = 0; i < cadena.length(); i++) {
			char caracter = cadena.charAt(i);
			if (!(caracter >= '0' && caracter <= '9')) {
				contador++;
			}
		}
		
		return contador;
	}

}
