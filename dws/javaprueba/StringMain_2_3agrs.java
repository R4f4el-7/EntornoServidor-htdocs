package com.infantaelena;

public class StringMain_2_3agrs {

	public static void main(String[] args) {
		int[] array = new int[3];
		
		for (int i = 0; i < array.length; i++) {
			array[i] = Integer.parseInt(args[i]);
		}
		for (int i = 0; i < array.length; i++) {
			System.out.print(array[i]+" ");
		}
		System.out.println();
		
	}
}
