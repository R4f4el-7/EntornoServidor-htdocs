/*5. Crea un array unidimensional donde le indiques el tamaño por teclado y crea una
función que rellene el array con los múltiplos de un número pedido por teclado. Por
ejemplo, si defino un array de tamaño 5 y elijo un 3 en la función, el array contendrá 3,
6, 9, 12, 15. Muéstralos por pantalla usando otra función distinta.
*/
package com.infantaelena;

import java.util.Scanner;

public class arrays_5_multiplos {

	static Scanner sc = new Scanner(System.in);
		
	public static void main(String[] args) {
	
		int tama;
			
		System.out.println("Introduce el tamaño del arrays: ");
		tama = sc.nextInt();
			
		int[] numeros = new int[tama];

		rellenar_array(tama,numeros);

	}
	static void rellenar_array(int tama, int[] num) {
		
		for (int i = 0; i < num.length; i++) {
			
			num[i] = tama * i;
			System.out.println(num[i]);
		}
		
	}

}
