package com.infantaelena;

import java.util.Scanner;

public class arrays04_3_quiniela {

	static Scanner sc = new Scanner(System.in);
	
	public static void main(String[] args) {

		char[] resultado = new char[15];
		int a;
		
		for (int i = 0; i < resultado.length; i++) {
			
			a = (int) (Math.random()*3+1);
			System.out.print(a+" ");
			if(a == 1) {
				resultado[i] = '1';
			}else if(a == 2) {
				resultado[i] = '2';
			}else if(a == 3) {
				resultado[i] = 'X';
			}
		}
		System.out.println();
		for (int i = 0; i < resultado.length; i++) {
			System.out.print(resultado[i]+" ");
		}
		
		
	}

}
