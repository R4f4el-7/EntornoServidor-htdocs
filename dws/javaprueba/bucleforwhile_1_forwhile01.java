/*1. Realiza una traza del siguiente programa y muestra cual sería la salida por
pantalla.
Implementa a continuación el algoritmo en Java.
*/
package com.infantaelena;

public class bucleforwhile_1_forwhile01 {

	public static void main(String[] args) {
		
		for (int i = 1; i < 4 ; i++) {
			
			int j = i + 1;
			
			while (j < 4) {
				
				System.out.println(j-i);
				j++;
				
			}
		}

		
	}

}
