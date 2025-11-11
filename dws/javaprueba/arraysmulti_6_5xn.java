/*1. Crear una matriz de 5 filas y n columnas (se pide al usuario). Rellenarlo con números
aleatorios. Usa el método random de Math*/
package com.infantaelena;

import java.util.Scanner;

public class arraysmulti_6_5xn {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		int[][] matriz = new int[5][];
		int columna;
		
		//rellenar columna
		for (int i = 0; i < 5; i++) {
			System.out.println("Introduce las columnas en la fila "+(i+1)+": ");
			columna = sc.nextInt();
			matriz[i] = new int[columna];
		}
		
		//rellenar
		
		for (int i = 0; i < matriz.length; i++) {
			for (int j = 0; j < matriz[i].length; j++) {
				
				matriz[i][j] = (int)(Math.random()*25+1);
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
