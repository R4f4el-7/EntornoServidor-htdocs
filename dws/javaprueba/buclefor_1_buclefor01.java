/*Realiza una traza del siguiente programa y muestra cual sería la salida por
pantalla.
Implementa a continuación el algoritmo en un procedimiento llamado void
bucleFor01().*/

package com.infantaelena;

public class buclefor_1_buclefor01 {

	public static void main(String[] args) {
		
		buclefor01();
	}
	static void buclefor01() {
		
		int suma;
		
		for (int i = 1; i <= 4  ; i++) {
			
			for(int j = 3; j >= 0; j--) {
				
				suma = (i * 10) + j;
				
				System.out.println(suma);
			}
			
		}
	}

}
