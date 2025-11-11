package com.infantaelena;

import java.util.Scanner;

public class calculadora {

	static Scanner sc = new Scanner(System.in);
	public static void main(String[] args) {

		
		char eleccion;
		
		//Usamos un bucle DO WHILE porque necesitamos que el menu se imprima como mínimo al menos una vez 
		do {
			
			System.out.println("Introduce + para sumar ");
			System.out.println("Introduce - para restar ");
			System.out.println("Introduce * para multiplicar ");
			System.out.println("Introduce / para dividir ");
			System.out.println("Introduce s para salir ");
			
			eleccion = sc.next().charAt(0);
			//usamos switch para gestionar la seleccion de menu
			switch (eleccion) {
			case '+':
				//uso void para que sea menos farragoso el codigo del main
				suma();
				break;

			case '-':
				
				resta();
				break;

			case '*':
				
				multiplicacion();
				break;

			case '/':
				
				dividir();
				break;

			case 's':
				
				break;
			
			default:
				
				System.out.println("opcion invalida");
				
				break;		
			}
			
		}while(eleccion != 's');
		
	}
	static void suma() {
		
		int suma = 0, num1,num2;
	
		System.out.println("Introduce el valor de num1: ");
		num1 = sc.nextInt();
		System.out.println("Introduce el valor de num2: ");
		num2 = sc.nextInt();
		
		suma = num1 + num2;
		
		System.out.println("La suma es: "+suma);

	
	}
	static void resta() {
		
		int resta = 0, num1,num2;
	
		System.out.println("Introduce el valor de num1: ");
		num1 = sc.nextInt();
		System.out.println("Introduce el valor de num2: ");
		num2 = sc.nextInt();
		
		resta = num1 + num2;
		
		System.out.println("La suma es: "+resta);

	
	}
	static void multiplicacion() {
		
		int multiplicacion = 0, num1,num2;
	
		System.out.println("Introduce el valor de num1: ");
		num1 = sc.nextInt();
		System.out.println("Introduce el valor de num2: ");
		num2 = sc.nextInt();
		
		multiplicacion = num1 + num2;
		
		System.out.println("La suma es: "+multiplicacion);

	
	}
	static void dividir() {
		
		double dividir = 0, num1,num2;
	
		System.out.println("Introduce el valor de num1: ");
		num1 = sc.nextDouble();
		System.out.println("Introduce el valor de num2: ");
		num2 = sc.nextDouble();
		
		dividir = num1 / num2;
		
		if ((num1 != 0)&&(num2 == 0)) {
			
			System.out.println("Es infinito");
			
		}else if ((num1 == 0)&&(num2 == 0)) {
			
			System.out.println("Es indeterminado");
			
		}else {
			
			System.out.println("La division es: "+dividir);
		}
	}
	
}
