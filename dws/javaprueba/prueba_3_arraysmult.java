package com.infantaelena;

import java.util.Scanner;

public class prueba_3_arraysmult {
	
	static Scanner sc = new Scanner(System.in);

	public static void main(String[] args) {

		int[][] academia = new int[3][4];
		
		rellenar(academia);
		mostrar(academia);
	}
	static void rellenar(int[][] academia) {
		
		for (int i = 0; i < academia.length; i++) {
			for (int j = 0; j < academia[i].length; j++) {
				System.out.println("Introduzca el valor en la fila "+(i+1)+" en la columna "+(j+1)+": ");
				academia[i][j] = sc.nextInt();
			}
		}
	}
	static void mostrar(int[][] academia) {
		
		for (int i = 0; i < academia.length; i++) {
			System.out.println();
			for (int j = 0; j < academia[i].length; j++) {
				
				if (academia[i][j] < 10) {
					System.out.print(" ");
				}
				System.out.print(academia[i][j]+" ");
				
			}
		}
	}

}
