/*2. Escribir una función llamada int diasDelMes (int mes) que reciba por
parámetro el número del mes, compruebe que está entre 1 y 12 y
devuelva el número de días que tiene (no se tienen en cuenta años
bisiestos)*/
package com.infantaelena;

import java.util.Scanner;

public class estructuraswitch_2_diasDelMes {

	public static void main(String[] args) {
		
		Scanner sc = new Scanner(System.in);
		int mes_;
		
		System.out.println("Introduce el mes: ");
		mes_ = sc.nextInt();
		
		System.out.println("Tiene "+diasDelMes(mes_)+" días este mes");
		
		sc.close();

	}
	static int diasDelMes(int mes) {
		
		switch (mes) {
		case 1:
			return 31;
		case 2:
			return 28;
		case 3:
			return 31;
		case 4:
			return 30;
		case 5:
			return 31;
		case 6:
			return 30;
		case 7:
			return 31;
		case 8:
			return 31;
		case 9:
			return 30;
		case 10:
			return 31;
		case 11:
			return 30;
		case 12:
			return 31;
		default:
			return -1;
		}
		
	}

}
