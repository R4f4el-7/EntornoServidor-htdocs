/*2. Crear una función llamada boolean esPositivo (int numero) que reciba un
número por parámetro y devuelva true si es positivo o false en caso
contrario*/
package com.infantaelena;

import java.util.Scanner;

public class estructuraif_2_espositivo {

	public static void main(String[] args) {
		
		int num;
		Scanner sc = new Scanner(System.in);
		
		
		System.out.println("Introduce el valor de num: ");
		num = sc.nextInt();
		
		if (espositivo(num)){
			System.out.println("Es positivo");
		}else {
			System.out.println("Es negativo");
		}
		sc.close();
	}
	static boolean espositivo(int numero) {
		
		if (numero > 0) {
			return true;
		}else {
			return false;
		}
		
	}

}
