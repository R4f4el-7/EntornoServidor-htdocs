/*2. Implementa un procedimiento llamada void tablasDeMultiplicar(), que
imprimirá por pantalla las tablas de multiplicar del 1 al 10 utilizando un
bucle for*/
package com.infantaelena;

import java.util.Scanner;

public class buclefor_2_tablasdemultiplicacion {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		tablasdemultiplicar();
	}
	
	static void tablasdemultiplicar() {
		
		int num, tabla;
		
		System.out.println("Indica el numero de la tabla que quiera ver: ");
		num = sc.nextInt();
		
		for (int i = 0; i < 11; i++) {
			
			tabla = num * i;
			System.out.println(tabla);
		}
	}

}
