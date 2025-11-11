/*1. Crea una matriz 2x2 que almacene los siguientes valores: 10,20,30,40 y muestra su
resultado. */
package com.infantaelena;

import java.util.Scanner;

public class arraysmulti_2_2x2 {

	static Scanner sc = new Scanner(System.in);
	public static void main(String[] args) {

		int[][] numero = new int[2][2];
		
		//rellenar
		for (int i = 0; i < numero.length; i++) {
			for (int j = 0; j < numero[i].length; j++) {
				System.out.println("Introduce el valor en: ");
				numero[i][j] = sc.nextInt();
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
