package com.infantaelena;

import java.util.Scanner;

public class prueba_2_Strings {
	
	public static void main(String[] args) {
		
	    Scanner sc = new Scanner(System.in);
	    System.out.println("Introduce String: ");

	    String str = sc.nextLine(); 
	    System.out.println("Nombre: " +str); 
	    System.out.println("Tamaño del String "+str.length());
	    //length te da la longitud del String
	    
	    
	    String s1;
	    String s2;
	    
	    System.out.println("Introduce valor para s1: ");
	    s1 = sc.nextLine();
	    System.out.println("Introduce valor para s2: ");
	    s2 = sc.nextLine();
	    
	    int len1 = s1.length();
	    int len2 = s2.length();
	    
	    
	    //en la condición puedo usar len1 o s1.length
	    if (len1 == len2) {
			System.out.println("Son iguales en tamaño y es "+len1);
		}else {
			System.out.println("No son iguales");
		}
	    sc.close();
	  }

}
