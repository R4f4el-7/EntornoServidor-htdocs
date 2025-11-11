package com.infantaelena;

import java.util.Scanner;

public class StringTexto_3_eliminarvocales {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		String cadena;
		
		System.out.println("Introduce cadena: ");
		cadena = sc.nextLine();
		
		System.out.println("La cadena sin vocales es: "+sinvocal(cadena));
		
	}
	public static String sinvocal(String cadena) {
		String cadenadev = "";
		
		for (int i = 0; i < cadena.length(); i++) {
			char caracter = cadena.charAt(i);
			if ((cadena.charAt(i) == 'a')||(cadena.charAt(i) == 'e')||(cadena.charAt(i) == 'i')
					||(cadena.charAt(i) == 'o')||(cadena.charAt(i) == 'u')) {
				caracter = ' ';
				cadenadev = cadenadev + caracter;
			}else
			cadenadev = cadenadev + cadena.charAt(i);
		}
		return cadenadev;
	}

}
