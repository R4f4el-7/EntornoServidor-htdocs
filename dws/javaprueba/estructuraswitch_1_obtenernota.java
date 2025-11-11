package com.infantaelena;

import java.util.Scanner;

public class estructuraswitch_1_obtenernota {

	enum Notas{insuficiente,suficiente,bien,notable,sobresaliente,error};
	
	public static void main(String[] args) {
		

		Scanner sc = new Scanner(System.in);
		int not;
		
		System.out.println("Introduce nota: ");
		not = sc.nextInt();
		
		System.out.println(obtenerNota(not));
		
		sc.close();
		
	}
	static Notas obtenerNota(int nota) {
		
		switch (nota) {
		case 1:
			return Notas.insuficiente;
		case 2:
			return Notas.insuficiente;
		case 3:
			return Notas.insuficiente;
		case 4:
			return Notas.insuficiente;
		case 5:
			return Notas.suficiente;
		case 6:
			return Notas.bien;
		case 7:
			return Notas.notable;
		case 8:
			return Notas.notable;
		case 9:
			return Notas.sobresaliente;
		case 10:
			return Notas.sobresaliente;
			

		default:
			return Notas.error;
			
		}
		
	}

}
