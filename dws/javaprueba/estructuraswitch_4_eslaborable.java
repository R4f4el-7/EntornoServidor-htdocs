/*4. Escribir una función llamada boolean esLaborable (int dia) que reciba por
parámetro un día compruebe que está entre el 1 al 7 y devuelva true si es
de lunes a viernes y false si es sábado o domingo. En caso de recibir un
número menor de uno o mayor que siete devolverá false.
*/
package com.infantaelena;

import java.util.Scanner;

public class estructuraswitch_4_eslaborable {

	public static void main(String[] args) {
		
		Scanner sc = new Scanner(System.in);
		int dia_;
		
		System.out.println("Introduce dia de la semana: ");
		dia_ = sc.nextInt();
		
		System.out.println(eslaborable(dia_));
		
		sc.close();
	}
	static boolean eslaborable(int dia) {
		
		switch (dia) {
		case 1:
			return true;
		case 2:
			return true;
		case 3:
			return true;
		case 4:
			return true;
		case 5:
			return true;
		case 6:
			return false;
		case 7:
			return false;
		default:
			return false;
		}
	}

}
