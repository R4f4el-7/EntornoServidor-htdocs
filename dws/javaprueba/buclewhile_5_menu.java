package com.infantaelena;

import java.util.Scanner;

public class buclewhile_5_menu {
	
	public static void main(String[] args) {
			
			Scanner sc = new Scanner(System.in);
			int eleccion;
			double num1, num2;
			
			do {
				
				System.out.println("Introduce 1 para sumar ");
				System.out.println("Introduce 2 para restar ");
				System.out.println("Introduce 3 para multiplicar ");
				System.out.println("Introduce 4 para dividir ");
				System.out.println("Introduce 0 para salir ");
				
				eleccion = sc.nextInt();
				
				switch (eleccion) {
				case 1:
					System.out.println("introduce el valor de a: ");
					num1 = sc.nextDouble();
					System.out.println("introduce el valor de b: ");
					num2 = sc.nextDouble();
					System.out.println(suma(num1,num2));
					break;
				case 2:
					System.out.println("resta");
					break;
				case 3:
					System.out.println("fr");
					break;
				case 4:
					System.out.println("sgh");
					break;
				default:
					break;		
				}
				
			}while(eleccion != 0);
			
			sc.close();
			
	}

	static double suma(double a, double b) {
		return a+b;
	}
	
	
}
