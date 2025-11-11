/*1. Crea un array unidimensional con un tamaño de 10, inserta los valores numéricos que
desees de la manera que quieras y muestra por pantalla la media de valores del array.*/
package com.infantaelena;

import java.util.Scanner;

public class arrays_1_tama10 {

	public static void main(String[] args) {
		
		int[] numeros = new int[10];
		
		insertar_valor(numeros);
		System.out.println("La media es: "+media(numeros));
	}
	
	static int[] insertar_valor(int[] num) {
		
		Scanner sc = new Scanner(System.in);
		
		for (int i = 0; i < num.length; i++) {
			
			System.out.println("Introduce el valor de la posicion "+i);
			num[i] = sc.nextInt();
			
		}
		sc.close();
		return num;
	}
	static int media(int[] num) {
		
		int suma = 0, media_;
		
		for (int i = 0; i < num.length; i++) {
			
			suma = suma + num[i];
			
		}
		media_ = suma / num.length;
		return media_;
	}

}
