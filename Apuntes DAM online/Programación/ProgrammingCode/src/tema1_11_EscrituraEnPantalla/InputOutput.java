package tema1_11_EscrituraEnPantalla;

import java.util.Scanner;

public class InputOutput {

	@SuppressWarnings("resource")
	public static void main(String[] args) {

		Scanner keyboard = new Scanner(System.in);
		String name;
		int age;
		float salary;

		// Entrada de datos
		System.out.print("Nombre: ");
		name = keyboard.nextLine();
		System.out.print("Edad: ");
		age = keyboard.nextInt();
		System.out.print("Salario: ");
		salary = keyboard.nextFloat();

		// Salida de datos
		System.out.printf("\nBienvenido: %s\n", name);
		System.out.printf("Tienes: %d años\n", age);
		System.out.printf("Tu salario es: %.2f euros\n", salary);

	}

}
