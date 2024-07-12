package tema5_2_ThrowsThrowFinally;

import java.util.InputMismatchException;
import java.util.Scanner;

public class Finally {

	@SuppressWarnings("resource")
	public void show() {

		int number = 0;
		String string;
		boolean error = false;
		Scanner keyboard = new Scanner(System.in);

		try {
			System.out.print("Introduce un número: ");
			number = keyboard.nextInt();
		} catch (InputMismatchException e) {
			System.out.println("Error");
			error = true;
		} finally {
			keyboard.nextLine();//Limpieza del buffer
		}

		System.out.print("Introduce una cadena: ");
		string = keyboard.nextLine();

		System.out.printf("El número introducido ha sido: %s\n", error ? "error" : number);
		System.out.printf("La cadena introducida ha sido: %s", string);

	}

	public static void main(String[] args) {

		new Finally().show();

	}

}
