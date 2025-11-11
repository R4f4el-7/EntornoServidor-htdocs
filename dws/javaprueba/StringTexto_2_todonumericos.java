/* Escriba la función boolean todosNumericos(String cadena) 
 * que nos dirá si la cadena contiene todos los caracteres numéricos o no.
*/
package com.infantaelena;

import java.util.Scanner;

public class StringTexto_2_todonumericos {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		String cadena;
		
		System.out.println("Introduce la cadena: ");
		cadena = sc.nextLine();
		
		System.out.println(todosnumericos(cadena));
	}
	public static boolean todosnumericos(String cadena) {
		
		int contador = 0;
		
		for (int i = 0; i < cadena.length(); i++) {
			char caracter = cadena.charAt(i);
			if (!(caracter >= '0' && caracter <= '9')) {
				contador++;
			}
		}
		if (contador != 0) {
			return false;
		}
		
		return true;
	}

}
