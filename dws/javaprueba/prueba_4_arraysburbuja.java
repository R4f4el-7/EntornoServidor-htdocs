package com.infantaelena;

public class prueba_4_arraysburbuja {

	public static void main(String[] args) {

		int[] tabla = new int[5];
		burbuja(tabla);
		
	}
	static void burbuja(int[] tabla) {
		
		int aux;
		
		for (int i = tabla.length; i > 0; i--) {
			for (int j = 0; j < i - 1; j++) {
				if (tabla[j] > tabla[j + 1]) {
					aux = tabla[j + 1];
					tabla[j + 1] = tabla[j];
					tabla[j] = aux;
				}
			}
		}
	}


}
