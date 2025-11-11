/*2.- Contador de palabras
Comprueba el número de palabras que hay en una frase introducida por teclado, teniendo en cuenta
que las palabras se separan por un espacio.*/
package com.infantaelena;

import java.util.Scanner;

public class StringAmpli_2_contpalabras {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		String cadena;
		
		System.out.println("Introduce la cadena: ");
		cadena = sc.nextLine();
		
		System.out.println("Hay "+contpalabras(cadena)+" palabras");
	}
	public static int contpalabras(String cadena) {
		
		String cadenadev = "";
		int contador = 0;
		
		for (int i = 0; i < cadena.length(); i++) {
			
			if (i == 0) {
				cadenadev = cadenadev + cadena.charAt(i);
				contador++;
				
			}else if (cadena.charAt(i-1) == ' ') {
				cadenadev = cadenadev + cadena.charAt(i);
				contador++;
			}
			else {
				cadenadev = cadenadev + cadena.charAt(i);
			}
		}
		return contador;
	}

}
