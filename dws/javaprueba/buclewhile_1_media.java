/*1. Escribir la función float media (float ... notas), que reciba un número
variable de notas de tipo float de una asignatura y calcule la media
utilizando un bucle while en formato float también.
*/
package com.infantaelena;

import java.util.Scanner;

public class buclewhile_1_media {

	public static void main(String[] args) {

		Scanner sc = new Scanner(System.in);
		float nota;
		
		System.out.println("Introduce el valor de notas: ");
		nota = sc.nextFloat();
		
		System.out.println(media(nota));
		sc.close();
	}
	static float media(float notas) {
		
		Scanner sc = new Scanner(System.in);
		float media, suma = 0, materia;
		int asignatura = 1;
		while (asignatura <= notas) {
			
			System.out.println("introduce el valor de asignatura "+asignatura+": ");
			materia = sc.nextFloat();
			
			suma = suma + materia;
			
			
			asignatura++;
		}
		media = suma / notas;
		sc.close();
		
		return  media;
		
	}

}
