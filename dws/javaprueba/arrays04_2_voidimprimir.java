package com.infantaelena;

import java.util.Scanner;

public class arrays04_2_voidimprimir {

static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		int[] numero = new int[5];
		
		rellenarArray(numero);
		imprimirArray(numero);
	}
	
	static void rellenarArray(int[] numeros) {
		
		for (int i = 0; i < numeros.length; i++) {
			
			System.out.println("Introduce el valor del elemento: ");
			numeros[i] = sc.nextInt();
			
		}
	}
	
	static void imprimirArray(int[] numeros) {
		
		for (int i = 0; i < numeros.length; i++) {
			
			System.out.print(numeros[i]+" ");
		}
	}

}
