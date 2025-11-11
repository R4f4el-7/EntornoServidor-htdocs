package com.infantaelena;

import java.util.Scanner;

public class arraysmulti_4_sumacolumna {

	static Scanner sc = new Scanner(System.in);
	public static void main(String[] args) {
		
		int dim1, dim2;
		
		System.out.println("Introduce el valor de dim1: ");
		dim1 = sc.nextInt();

		System.out.println("Introduce el valor de dim2: ");
		dim2 = sc.nextInt();
		
		int[][] matriz = new int[dim1][dim2];
		int suma = 0;
		int columna = 0;
		
		for (int i = 0; i < matriz.length; i++) {
			for (int j = 0; j < matriz[i].length; j++) {
				System.out.println("introduce el valor en: ");
				matriz[i][j] = sc.nextInt();
			}
		}
		
		for (int i = 0; i < matriz.length; i++) {
			System.out.println();
			for (int j = 0; j < matriz[i].length; j++) {
				System.out.print(matriz[i][j]+" ");
			}
		}
		
		System.out.println("Elige la columna que quiere sumar: ");
		columna = sc.nextInt();
		
		if (columna <= dim2) {
				
				for (int i = 0; i < matriz.length; i++) {
					for (int j = 0; j < matriz[i].length; j++) {
						suma = suma + matriz[i][j];
					}
				}
			
		}
		
	}

}
