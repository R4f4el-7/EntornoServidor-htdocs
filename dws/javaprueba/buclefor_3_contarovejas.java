/*3. Programa una función llamada void contarOvejas(int numOvejas), que
reciba un número entero e imprima en pantalla el número de ovejas
utilizando un bucle for:
Por ejemplo para 3 debería devolver 1 oveja...2 ovejas...3 ovejas…
Nota que la primera oveja debería ir en singular.*/
package com.infantaelena;

import java.util.Scanner;

public class buclefor_3_contarovejas {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		int numove;
		
		System.out.println("Introduzca el numero de oveja: ");
		numove = sc.nextInt();
		
		contarovejas(numove);
	}
	static void contarovejas(int numovejas) {
		
		for (int i = 1; i <= numovejas; i++) {
			
			System.out.println(i+(i == 1 ? " oveja":" ovejas") );
		}
		
	}

}
