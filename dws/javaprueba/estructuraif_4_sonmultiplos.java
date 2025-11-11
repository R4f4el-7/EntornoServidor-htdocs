/*4. Crear una función llamada boolean sonMultiplos (int a, int b) que reciba
dos números por parámetro y devuelva true si uno es multiplo del otro o
false en caso contrario.*/
package com.infantaelena;

import java.util.Scanner;

public class estructuraif_4_sonmultiplos {

	public static void main(String[] args) {
		
		Scanner sc = new Scanner(System.in);
		int a, b;
		
		
		System.out.println("Introduce valor para a: ");
		a = sc.nextInt();
		
		System.out.println("Introduce valor para b: ");
		b = sc.nextInt();
		
		
		if (sonmultiplo(a,b)) {
			
			System.out.println("Son multiplos");
			
		}else{
			
			System.out.println("No son multiplos");
			
		}
		sc.close();
	}
	static boolean sonmultiplo(int num1, int num2){
		
		if (num1 % num2 == 0) {

			return true;
			
		}else if(num2 % num1 == 0){
			
			return true;
			
		}else {
			return false;
		}
		
	}

}
