/*10.Crear una función llamada enum Notas obtenerNota (int nota) que reciba
nota del 0 al 10 y devuelva un enum Notas con los valores INSUFICIENTE,
SUFICIENTE, BIEN, NOTABLE, SOBRESALIENTE y ERROR. En caso de que la
nota sea menor que 0 o mayor que 10 devolverá ERROR.*/


package com.infantaelena;

import java.util.Scanner;

public class estructuraif_10_obtenernota {

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
		
		if ((nota < 6)&&(nota > 0)) {
			
			return Notas.insuficiente;
			
		}else if(nota == 5){
			
			return Notas.suficiente;
			
		}else if(nota == 6){
			
			return Notas.bien;
			
		}else if((nota < 9)&&(nota > 6)){
			
			return Notas.notable;
			
		}else if((nota < 11)&&(nota > 8)){
			
			return Notas.sobresaliente;
			
		}
		
		return Notas.error;
	}

}
