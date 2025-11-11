package com.infantaelena;

import java.util.Scanner;

public class funcion_1_llamada {

	public static void main(String[] args) {
		
		Scanner sc = new Scanner(System.in);
		int num = 0 ;
		
		System.out.println("El valor de num es: "+llamada(num));
		
		sc.close();

	}
	static int llamada(int n) {
		
		Scanner sc = new Scanner(System.in);
		System.out.println("Introduce un número por teclado: ");
		n = sc.nextInt();
		
		sc.close();
		return n;
	}

}
