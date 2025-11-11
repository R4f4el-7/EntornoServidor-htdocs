/*Escriba la función String cadenaDelReves(String cadena) 
 * que nos devuelva la cadena del revés.*/
package com.infantaelena;

import java.util.Scanner;

public class StringTexto_6_cadenadelreves {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {
		
		String cadena;
		
		System.out.println("Introduce cadena: ");
		cadena = sc.nextLine();
		
		System.out.println("La cadena al reves es: "+alreves(cadena));
	}
	public static String alreves(String cadena) {
		String caracter = "";
		for (int i = cadena.length()-1; i >= 0; i--) {
			 caracter = caracter + cadena.charAt(i);
			System.out.print(caracter);
		}
		return caracter;
	}
}

		