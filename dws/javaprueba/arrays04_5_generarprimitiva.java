package com.infantaelena;

import java.util.Scanner;

public class arrays04_5_generarprimitiva {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		int numeroApuestas;
		
		System.out.println("Introduzca numero de apuestas: ");
		numeroApuestas = sc.nextInt();
		
		generarprimitiva(numeroApuestas);
				
		
	}
	
	static int[][] generarprimitiva(int numeroApuestas){
		
		int[][] matriz = new int[8][49];
		
		//rellenar
		
		for (int i = 0; i < matriz.length; i++) {
			for (int j = 0; j < matriz[i].length; j++) {
				matriz[i][j] = j;
			}
		}
		
		//mostrar
		
		for (int i = 0; i < matriz.length; i++) {
			System.out.println();
			for (int j = 0; j < matriz[i].length; j++) {
				System.out.print((matriz[i][j] + 1)+" ");
				
			}
		}
		
		return matriz;
	}
	
	static void primitiva() {
		
		
	}
	

}
