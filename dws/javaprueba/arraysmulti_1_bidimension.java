/*Representacion de array bidimensional(Rellenar y mostrar)*/
package com.infantaelena;

import java.util.Scanner;

public class arraysmulti_1_bidimension {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		int dim1, dim2;
		
		System.out.println("Introduce el valor de dim1: ");
		dim1 = sc.nextInt();
		System.out.println("Introduce el valor de dim2: ");
		dim2 = sc.nextInt();
		
		int[][] matriz = new int[dim1][dim2];
		
		//RELLENAR
		for (int i = 0; i < dim1; i++) {
			for (int j = 0; j < dim2; j++) {
				
				System.out.println("Introduzca el valor en la fila "+(i+1)+" en la columna "+(j+1)+": ");
				matriz[i][j] = sc.nextInt();
			}
		}
		//MOSTRAR
		for (int i = 0; i < dim1; i++) {
			System.out.println();
			for (int j = 0; j < dim2; j++) {
				
				if (matriz[i][j] < 10) {
					System.out.print(" ");
				}
				System.out.print(matriz[i][j]+" ");
			}
		}
		
	}

}
