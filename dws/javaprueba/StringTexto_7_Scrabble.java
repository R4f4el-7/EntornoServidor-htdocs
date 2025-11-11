/*Crea la función int puntuacionScrabble(String palabra) 
 * que devolverá la puntuación que tendría en el Scrabble:

Letra                          		Valor
A, E, I, O, U, L, N, R, S, T       	1
D, G                              		2
B, C, M, P                         	3
F, H, V, W, Y                      	4
K                                  		5
J, X , Ñ                              	8
Q, Z                               		10

Ejemplo :

puntuacionScrabble ("niño") devolvería 11
*/
package com.infantaelena;

public class StringTexto_7_Scrabble {

	public static void main(String[] args) {

		String cadena = "neña";
		
		System.out.println("Obtienes "+puntuacionScrabble(cadena)+" puntos");
	}
	public static int puntuacionScrabble(String palabra) {
		
		int puntuacion = 0;
		
		for (int i = 0; i < palabra.length(); i++) {
			if (palabra.charAt(i) == 'a'|| palabra.charAt(i) == 'o'||palabra.charAt(i) == 'i') {
				puntuacion = puntuacion + 1;
			}
		}
		return puntuacion;
	}

}
