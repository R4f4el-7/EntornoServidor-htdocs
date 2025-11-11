package com.infantaelena;

import java.util.Scanner;

public class StringTexto_4_contarvocales {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		String cadena;
		
		System.out.println("Introduce cadena: ");
		cadena = sc.nextLine();
		
		System.out.println("La cadena tiene "+contarvocal(cadena)+" vocales");
		
	}
	public static int contarvocal(String cadena) {
		
		int contador = 0;
		
		for (int i = 0; i < cadena.length(); i++) {
			if ((cadena.charAt(i) == 'a')||(cadena.charAt(i) == 'e')||(cadena.charAt(i) == 'i')
					||(cadena.charAt(i) == 'o')||(cadena.charAt(i) == 'u')) {
				contador++;
			}
		}
		return contador;
	}


}
