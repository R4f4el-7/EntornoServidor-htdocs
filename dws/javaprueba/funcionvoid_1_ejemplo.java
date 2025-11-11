package com.infantaelena;

import java.util.Scanner;

public class funcionvoid_1_ejemplo {

	public static void main(String[] args) {

		Scanner sc = new Scanner(System.in);
		int eleccion;
		
		do {
			System.out.println("Introduce eleccion: ");
			eleccion = sc.nextInt();
			suma();
		}while(eleccion != 0);
		
		sc.close();
	}
	public static void suma() {
		
		Scanner sc = new Scanner(System.in);
		int a, b;
		
		System.out.println("Introduce el valor de a: ");
		a = sc.nextInt();

		System.out.println("Introduce el valor de b: ");
		b = sc.nextInt();
		
		System.out.println(a+b);
		
		sc.close();
		return;
	}

}
