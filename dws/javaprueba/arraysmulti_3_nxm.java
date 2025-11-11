package com.infantaelena;

import java.util.Scanner;

public class arraysmulti_3_nxm {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		int dim1, dim2;
		
		System.out.println("Introduce el valor de dim1: ");
		dim1 = sc.nextInt();

		System.out.println("Introduce el valor de dim2: ");
		dim2 = sc.nextInt();
		
		int[][] matriz = new int[dim1][dim2];
		
		//rellenar
		for (int i = 0; i < matriz.length; i++) {
			for (int j = 0; j < matriz[i].length; j++) {
				System.out.println("Introduce el valor en: ");
				matriz[i][j] = sc.nextInt();
			}
		}
		
		//mostrar
		for (int i = 0; i < matriz.length; i++) {
			System.out.println();
			for (int j = 0; j < matriz[i].length; j++) {
				if (matriz[i][j] < 10) {
					System.out.print(" ");
				}
				System.out.print(matriz[i][j]+" ");
			}
		}
	}

}
