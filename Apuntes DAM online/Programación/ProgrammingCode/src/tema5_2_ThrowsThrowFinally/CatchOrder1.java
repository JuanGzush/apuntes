package tema5_2_ThrowsThrowFinally;

import java.util.InputMismatchException;
import java.util.Scanner;

public class CatchOrder1 {

	@SuppressWarnings("resource")
	public void show() {

		final String FIN = "fin";
		String string;
		byte number = 0;
		Scanner keyboard = new Scanner(System.in);

		try {
			System.out.print("Introduce un número de tipo byte, es decir, entre -128 y 127: ");
			number = keyboard.nextByte();
			keyboard.nextLine(); //Limpieza del buffer
			System.out.printf("Valor del número introducido: %d\n", number);
			System.out.print("Introduzca otro número de tipo byte o fin para terminar: ");
			string = keyboard.nextLine();
			if (!string.toLowerCase().equals(FIN)) {
				number = Byte.parseByte(string);
				System.out.printf("Valor del otro número introducido: %d\n", number);
			}
		} catch (Exception e) {
			System.out.println("Error: no ha introducido un número entre -128 y 127");
		} catch (InputMismatchException e) {//Error de compilación: inalcanzable bloque catch
			System.out.println("Error");
		}

	}

	public static void main(String[] args) {

		new CatchOrder1().show();

	}

}
