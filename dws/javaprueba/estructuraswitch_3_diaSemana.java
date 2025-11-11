/*3. Escribir una función llamada enum Dias diaSemana (int dia) que reciba por
parámetro un día, compruebe que el día está entre el 1 y el 7 y devuelva a
que día corresponde en una enumeración llamada Dias que contendrá los
valores LUNES, MARTES…. En caso de recibir un número menor de uno o
mayor que siete devolverá el valor ERROR de la numeración*/
package com.infantaelena;

import java.util.Scanner;

public class estructuraswitch_3_diaSemana {
	
	enum dias{LUNES,MARTES,MIERCOLES,JUEVES,VIERNES,SÁBADO,DOMINGO,ERROR};

	public static void main(String[] args) {

		Scanner sc = new Scanner(System.in);
		int dia_;
		
		System.out.println("Introduce dia de la semana: ");
		dia_ = sc.nextInt();
		
		System.out.println(diaSemana(dia_));
		
		sc.close();
		
	}
	static dias diaSemana(int dia) {
		
		switch (dia) {
		case 1:
			return dias.LUNES;
		case 2:
			return dias.MARTES;
		case 3:
			return dias.MIERCOLES;
		case 4:
			return dias.JUEVES;
		case 5:
			return dias.VIERNES;
		case 6:
			return dias.SÁBADO;
		case 7:
			return dias.DOMINGO;
		default:
			return dias.ERROR;
		}
		
	}

}
