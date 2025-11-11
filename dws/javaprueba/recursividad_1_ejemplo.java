package com.infantaelena;

import java.util.Scanner;

public class recursividad_1_ejemplo {

	public static void main(String[] args) {

		Scanner sc = new Scanner(System.in);
		
		int num;
		
		System.out.println("Introduce el valor de num: ");
		num = sc.nextInt();
		
		System.out.println(factorial(num));
		
		sc.close();
	}
	static int factorial(int n) {
		
		int result;
		
		if (n == 0) {
			
			result = 1;
			
		}else {
			
			result = n*factorial(n-1);
			
		}
		
		return result;
	}

}
