package com.infantaelena;

public class prueba_1_arraysmult {

	public static void main(String[] args) {

		int[][] numeros = {{1,2,3},{4,5,6}};
		
		
		/*Para determinar la longitud del segundo corchete usamos
		nombre_matriz[i].length, es decir, indexamos(registramos datos) 
		a partir del primer corchete  */
		
		//MOSTRAR
		for (int i = 0; i < numeros.length; i++) {
			System.out.println();
			for (int j = 0; j < numeros[i].length; j++) {
				System.out.print(numeros[i][j]+" ");
			}
		}
		
	}

}
