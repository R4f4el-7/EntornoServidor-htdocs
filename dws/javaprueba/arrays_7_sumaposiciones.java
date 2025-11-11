package com.infantaelena;

import java.util.Scanner;

public class arrays_7_sumaposiciones {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		int[] array_1 = new int[3];
		int[] array_2 = new int[3];
		int[] arrays_suma = new int[3];
		
		rellenar(array_1,array_2,arrays_suma);
		mostrar(array_1,array_2,arrays_suma);
		
	}
	
	static void rellenar(int[] array_1, int[] array_2, int[] arrays_suma) {
		
		for (int i = 0; i < array_1.length; i++) {
			
			System.out.println("Introduzca el valor del array 1 en la posicion "+i);
			array_1 [i] = sc.nextInt();
		}
		
		for (int i = 0; i < array_2.length; i++) {
			
			System.out.println("Introduzca el valor del array 2 en la posicion "+i);
			array_2 [i] = sc.nextInt();
		}
		
		for (int i = 0; i < arrays_suma.length; i++) {
			
			arrays_suma[i] = array_1 [i] + array_2 [i]; 
		}
		
	}
	
	static void mostrar(int[] array_1, int[] array_2, int[] arrays_suma) {
		
		for (int i = 0; i < arrays_suma.length; i++) {
			
			System.out.println(array_1 [i]);
		
		}
		for (int i = 0; i < arrays_suma.length; i++) {
		
			System.out.println(array_2 [i]);
		
		}
		for (int i = 0; i < arrays_suma.length; i++) {
		
			System.out.println(arrays_suma [i]);
		
		}
		
	}

}
