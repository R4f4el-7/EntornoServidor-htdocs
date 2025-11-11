/*2. Escribir la función boolean esPrimo (int numero) que utilizando un bucle
while devuelva que true si un número es primo y false en caso contrario.
*/
package com.infantaelena;

import java.util.Scanner;

public class buclewhile_2_esprimo {

	public static void main(String[] args) {

		Scanner sc = new Scanner(System.in);
		int num;
		
		System.out.println("Introduce el valor de num: ");
		num = sc.nextInt();
		
		System.out.println(esprimo(num));
		sc.close();
	}
	static boolean esprimo (int numero) {
		
		int i = 1, contador_primo = 0;
		
		while (i <= numero) {
			if (i % numero == 0) {
				
				contador_primo = contador_primo + 1;
				
			}
			i++;
		}
		
		if (contador_primo <= 2) {
			
			return true;
			
		} else {
			
			return false;
			
		}
	}

}
