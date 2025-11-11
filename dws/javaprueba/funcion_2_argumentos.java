/*2. Realizar un programa que reciba tres argumentos de números positivos
por la función main, en caso de recibir más de 3 o menos de 3 o un
número negativo devolverá -1. El programa devolverá el mayor número de
los tres recibidos.*/
package com.infantaelena;

import java.util.Scanner;

public class funcion_2_argumentos {

	public static void main(String[] args) {
		
		 int argumento1, argumento2, argumento3;
		 
		 Scanner sc = new Scanner(System.in);
		 
		 System.out.println("Introduce un valor a argumento1: ");
		 argumento1 = sc.nextInt();
		 
		 System.out.println("Introduce un valor a argumento2: ");
		 argumento2 = sc.nextInt();

		 System.out.println("Introduce un valor a argumento3: ");
		 argumento3 = sc.nextInt();
		 
		 System.out.println("El numero mayor es "+mayorde3(argumento1,argumento2,argumento3));
		 
		 sc.close();
	}
	static int mayorde3(int arg1,int arg2,int arg3) {
		
		int mayor_num = 0;
		
		//Para saber que numero es mayor
		
		if ((arg1 < 0)||(arg2 < 0)||(arg3 < 0)) {
			
			mayor_num = -1;
			
		}else if ((arg1 > arg2)&&(arg1 > arg3)) {
			
			mayor_num = arg1;
			
		} else if ((arg2 > arg1)&&(arg2 > arg3)) {
			
			mayor_num = arg2;
			
		} else if ((arg3 > arg1)&&(arg3 > arg2)) {
			
			mayor_num = arg3;
			
		} 
		
		return mayor_num;
	}
}
