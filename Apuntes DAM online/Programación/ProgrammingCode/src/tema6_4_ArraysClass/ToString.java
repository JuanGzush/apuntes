package tema6_4_ArraysClass;

import java.util.Arrays;

public class ToString {

	public void show() {

		int[] array = { 3, 4, 5, 6, 7, 8 };
		System.out.printf("La información del array es: %s", Arrays.toString(array));

	}

	public static void main(String[] args) {

		new ToString().show();

	}

}
