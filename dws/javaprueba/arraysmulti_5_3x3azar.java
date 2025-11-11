/*4. Llenar una matriz de 3 x 3 completamente de números aleatorios entre 0 y 9. Para
rellenar con números aleatorios usa la función azar ()*/
package com.infantaelena;

import java.util.Scanner;

public class arraysmulti_5_3x3azar {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		int[][] numero = new int[3][3];
		
		//rellenar
		for (int i = 0; i < numero.length; i++) {
			for (int j = 0; j < numero[i].length; j++) {
				numero[i][j] = (int)(Math.random()*9);
			}
		}
		
		//mostrar
		for (int i = 0; i < numero.length; i++) {
			
			System.out.println();
			
			for (int j = 0; j < numero[i].length; j++) {
				
				if (numero[i][j] < 10) {
					System.out.print(" ");
				}
				System.out.print(numero[i][j]+" ");
			}
		}
	}

}
