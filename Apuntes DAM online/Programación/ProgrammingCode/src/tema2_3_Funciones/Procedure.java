package tema2_3_Funciones;

import static tema1_11_EscrituraEnPantalla.colores.Colors.RED;
import static tema1_11_EscrituraEnPantalla.colores.Colors.RESET;

import java.util.Scanner;

public class Procedure {

	@SuppressWarnings("resource")
	public static void main(String[] args) {

		Scanner keyboard = new Scanner(System.in);
		String string;

		System.out.print("Introduce una cadena: ");
		string = keyboard.nextLine();
		paintRed(string);

	}

	public static void paintRed(String string) {

		System.out.printf("La cadena que has introducido en rojo: %s", RED + string + RESET);

	}
}
