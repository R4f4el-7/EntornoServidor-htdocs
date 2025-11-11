/*3. Crear una función llamada String parOimpar (int numero)que reciba un
número por parámetro y devuelva “Par” si es par e “Impar” en caso
contrario.*/
package com.infantaelena;

import java.util.Scanner;

public class estructuraif_3_funcionstring {
	
	public static void main(String[] args) {
		
		int numero;
		Scanner sc = new Scanner(System.in);
		
		System.out.println("Introduce el valor de numero: ");
		numero = sc.nextInt();
		
		System.out.println(parOimpar(numero));
		
		sc.close();
	}
	static String parOimpar(int num) {
		
		String impar, par = "par";
		
		if (num % 2 == 0) {
			
			return par;
			
		}else {
			
			impar = "impar";
			return impar;
			
		}
		
	}
	
}
