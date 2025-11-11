/*1.- Iniciales
Crea un programa al que se le pase una frase y la transforme en título, de tal manera que cada inicial
de las palabras que compone la frase irá en mayúscula y el resto de letras de la palabra en
minúscula.
*/
package com.infantaelena;

import java.util.Scanner;

public class StringAmpli_1_iniciales {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		String cadena;
		
		System.out.println("Introduce la cadena: ");
		cadena = sc.nextLine();
		
		System.out.println("Las iniciales son: "+iniciales(cadena));
	}
	public static String iniciales(String cadena) {
		
		String cadenadev = "";
		char caracter;
		for (int i = 0; i < cadena.length(); i++) {
			
			if (i == 0) {
				
				caracter = cadena.toUpperCase().charAt(i);
				System.out.println(caracter);
				cadenadev = cadenadev + caracter;
				
			}else if (cadena.charAt(i-1) == ' ') {
				
				caracter = cadena.toUpperCase().charAt(i);
				System.out.println(caracter);
				cadenadev = cadenadev + caracter;
			}
			else {
				
				cadenadev = cadenadev + cadena.toLowerCase().charAt(i);
				
			}
		}
		return cadenadev;
	}

}
