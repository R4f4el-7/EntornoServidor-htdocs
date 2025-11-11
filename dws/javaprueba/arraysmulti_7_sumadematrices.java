package com.infantaelena;

import java.util.Scanner;

public class arraysmulti_7_sumadematrices {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {
		
		int fila, columna;
		
		System.out.println("Introduce las filas: ");
		fila = sc.nextInt();
		System.out.println("Introduce las columnas: ");
		columna = sc.nextInt();
		
		int[][] matriz1 = new int[fila][columna];
		int[][] matriz2 = new int[fila][columna];
		int[][] suma = new int[fila][columna];
		
		
		//rellenar
		for (int i = 0; i < matriz1.length; i++) {
			for (int j = 0; j < matriz1[i].length; j++) {
				matriz1[i][j] =(int)(Math.random()*9);
				matriz2[i][j] =(int)(Math.random()*9);
				suma[i][j] = matriz1[i][j] + matriz2[i][j];
			}
		}
		
		//mostrar
		for (int i = 0; i < matriz1.length; i++) {
			System.out.println();
			for (int j = 0; j < matriz1[i].length; j++) {
				System.out.print(matriz1[i][j]+" ");
			}
		}
		for (int i = 0; i < matriz1.length; i++) {
			System.out.println();
			for (int j = 0; j < matriz1[i].length; j++) {
				System.out.print(matriz2[i][j]+" ");
			}
		}
		for (int i = 0; i < matriz1.length; i++) {
			System.out.println();
			for (int j = 0; j < matriz1[i].length; j++) {
				System.out.print(suma[i][j]+" ");
			}
		}
	}

}
