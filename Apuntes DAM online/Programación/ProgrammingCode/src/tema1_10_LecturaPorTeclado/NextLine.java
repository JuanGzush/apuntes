package tema1_10_LecturaPorTeclado;

import java.util.Scanner;

public class NextLine {

	@SuppressWarnings("resource")
	public static void main(String[] args) {

		Scanner keyboard = new Scanner(System.in);
		String string;
		int number;
		boolean b;

		// El nextLine toma el salto de línea dejado por cualquier otro next
		System.out.println("Introduzca un número entero: ");
		number = keyboard.nextInt();
		System.out.println(number);
		System.out.println("Introduzca una cadena: ");
		string = keyboard.nextLine();
		System.out.println(string);
		System.out.println("Introduzca un boolean: ");
		b = keyboard.nextBoolean();
		System.out.println(b);
		System.out.println("Introduzca una cadena: ");
		string = keyboard.nextLine();
		System.out.println(string);
		System.out.println("Introduzca una cadena con next: ");
		string = keyboard.next();
		System.out.println(string);
		System.out.println("Introduzca una cadena con nextLine: ");
		string = keyboard.nextLine();
		System.out.println(string);
		// Solución: poner un nextLine que coja el salto de línea.A esto se le conoce como limpiar el buffer.
		System.out.println("Vamos a solucionar el problema.\nIntroduzca un número entero: ");
		number = keyboard.nextInt();
		System.out.println(number);
		System.out.println("Introduzca una cadena: ");
		keyboard.nextLine(); // Limpieza del buffer
		string = keyboard.nextLine();
		System.out.println(string);

	}

}
