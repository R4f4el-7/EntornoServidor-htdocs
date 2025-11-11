/*7. Crear una función llamada short contarCifras (short numero) que reciba un
número short y devuelva el número de cifras tiene, en caso de recibir un
número menor a 0 o mayor a 9999 devolverá -1.*/
package com.infantaelena;

import java.util.Scanner;

public class estructuraif_7_contarcifras {
	
	public static void main(String[] args) {
		
		Scanner sc = new Scanner(System.in);
		short num;
		
		System.out.println("Introduce el valor para num: ");
		num = sc.nextShort();
		
		System.out.println(contarcifras(num));
		sc.close();
	}
	static short contarcifras(short numero) {
		
		if (numero > 9999) {
			
			numero = -1;
			
		}else if (numero < 0) {
			
			numero = -1;
			
		}else if ((numero > 999)&&(numero < 10000)) {
			
			numero = 4;
			
		}else if ((numero > 99)&&(numero < 1000)) {
			
			numero = 3;
			
		}else if ((numero > 9)&&(numero < 100)) {
			
			numero = 2;
			
		}else if ((numero > 0)&&(numero < 10)) {
			
			numero = 1;
			
		}
		return numero;
	}

}
