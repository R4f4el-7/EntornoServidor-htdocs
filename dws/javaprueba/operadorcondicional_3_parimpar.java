/*3. Crear una función llamada String parImpar (int numero) que recibe un
número por parámetro y devuelva utilizando el operador condicional
“Par” si es par e “Impar” en caso contrario.
*/
package com.infantaelena;

import java.util.Scanner;

public class operadorcondicional_3_parimpar {

	public static void main(String[] args) {

		Scanner sc = new Scanner(System.in);
		int num;
		
		System.out.println("Introduce el valor de num1: ");
		num = sc.nextInt();
		
		System.out.println(parimpar(num));
		sc.close();
	}
	static String parimpar(int numero) {
		
		String parimpar = numero % 2 == 0 ? "par" : "impar";
		return parimpar;
	}

}
