/*8. Crear una función llamada short invertirCifras (short numero) que reciba
un número short entre 0 y 9999 y devuelva el número al revés, en caso
de recibir un número menor a 0 o mayor a 9999 devolverá -1.*/
package com.infantaelena;

import java.util.Scanner;

public class estructuraif_8_invertircifras {

	public static void main(String[] args) {
		
		Scanner sc = new Scanner(System.in);
		short num;
		
		System.out.println("Introduce el valor para num: ");
		num = sc.nextShort();
		
		System.out.println(invertircifras(num));
		
		sc.close();

	}
	static short invertircifras(short numero) {
		
		
		if (numero > 9999) {
			
			return -1;
			
		}else if (numero < 0) {
			
			return -1;
			
		}
		return -1;
	}

}
