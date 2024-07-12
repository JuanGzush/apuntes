package tema2_1_ProgramacionEstructurada;

import java.util.Scanner;

public class IfElse {

	@SuppressWarnings("resource")
	public static void main(String[] args) {

		Scanner keyboard = new Scanner(System.in);
		int age;
		String name;

		System.out.print("Introduce tu nombre: ");
		name = keyboard.nextLine();
		System.out.print("Introduce tu edad: ");
		age = keyboard.nextInt();

		if (age >= 18) {
			System.out.printf("Bienvenido/a %s\n", name);
			System.out.println("Eres mayor de edad");
		} else {
			System.out.printf("Bienvenido/a %s\n", name);
			System.out.println("Eres menor de edad");
		}

	}

}
