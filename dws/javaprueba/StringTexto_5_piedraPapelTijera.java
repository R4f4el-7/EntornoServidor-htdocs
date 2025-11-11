/* Escriba la función String piedraPapelTijera
 * (String jugada1, String jugada2) 
 * que reciba dos cadenas con una jugada “piedra”, “papel” o “tijera” y devuelva:
"¡Gano el jugador 1!"
"¡Gano el jugador 2!"
"¡Empate!"

Tener en cuenta que la jugada puede ir en mayúsculas o minúsculas y contener espacios al principio y al final.
*/
package com.infantaelena;

import java.util.Scanner;

public class StringTexto_5_piedraPapelTijera {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		String cadena1;
		String cadena2;
		
		System.out.println("Introduce la cadena1: ");
		cadena1 = sc.nextLine();
		System.out.println("Introduce la cadena2: ");
		cadena2 = sc.nextLine();
		
		cadena1 = cadena1.trim().toLowerCase();
		cadena2 = cadena2.trim().toLowerCase();
		
		System.out.println(piedrapapeltijera(cadena1,cadena2));
	}
	public static String piedrapapeltijera(String cad1, String cad2) {
		
		if ((cad1 == "piedra")&&(cad2 == "tijera")||
				(cad1 == "tijera")&&(cad2 == "piedra")||
					(cad1 == "papel")&&(cad2 == "piedra")) {
			return "1";
		}else {
			return "2";
		}
	}

}
