package tema1_10_LecturaPorTeclado;

import java.util.Scanner;

public class Next2 {

	@SuppressWarnings("resource")
	public static void main(String[] args) {

		Scanner keyboard = new Scanner(System.in).useDelimiter("\\n");// Para Linux y Mac
		// Scanner keyboard = new Scanner(System.in).useDelimiter("\\r\\n");//Para Windows
		String string;
		int number;

		System.out.println("Introduzca un número entero: ");
		number = keyboard.nextInt();
		System.out.println(number);
		System.out.println("Introduzca una cadena: ");
		string = keyboard.next();
		System.out.println(string);

	}

}
