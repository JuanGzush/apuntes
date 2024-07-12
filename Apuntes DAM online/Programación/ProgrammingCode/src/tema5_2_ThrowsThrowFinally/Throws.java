package tema5_2_ThrowsThrowFinally;

import java.util.Scanner;

public class Throws {

	@SuppressWarnings("resource")
	public void show() {

		final String FIN = "fin", SIGUIENTE = "siguiente";
		int number;
		String string;
		Scanner keyboard = new Scanner(System.in);

		try {
			System.out.print("Introduce un número o siguiente para pasar al siguiente número: ");
			string = keyboard.nextLine();
			if (!string.toLowerCase().equals(SIGUIENTE)) {
				/*
				 * Aquí no estamos obligados a poner un try-catch porque 
				 * NumberFormatException es hija de RuntimeException:
				 */
				number = convertirNumero(string);
				System.out.printf("Valor del número introducido: %d\n", number);
			}
		} catch (NumberFormatException e) {
			System.out.println("Error en el número");
		}

		try {
			System.out.print("Introduce un número o fin para terminar: ");
			string = keyboard.nextLine();
			if (!string.toLowerCase().equals(FIN)) {
				/*
				 * Aquí sí estamos obligados a poner un try-catch porque 
				 * Exception no es hija de RuntimeException:
				 */
				number = convertirNumero2(string);
				System.out.printf("Valor del número introducido: %d\n", number);
			}
		} catch (Exception e) {
			System.out.println("Error en el número");
		}

	}

	public int convertirNumero(String string) throws NumberFormatException {

		return Integer.parseInt(string);

	}

	public int convertirNumero2(String string) throws Exception {

		return Integer.parseInt(string);

	}

	public static void main(String[] args) {

		new Throws().show();

	}

}
