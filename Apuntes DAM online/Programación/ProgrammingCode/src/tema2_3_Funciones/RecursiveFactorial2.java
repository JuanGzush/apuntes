package tema2_3_Funciones;

import java.util.Scanner;

public class RecursiveFactorial2 {

	@SuppressWarnings("resource")
	public static void main(String[] args) {

		Scanner keyboard = new Scanner(System.in);
		int n;

		do {
			System.out.println("Introduzca un número entero positivo: ");
			n = keyboard.nextInt();
		} while (n <= 0);

		System.out.printf("El factorial de %d es %d", n, factorial(n));

	}

	public static int factorial(int n) {

		int result;

		if (n == 1) { //Caso base: devuelve un 1
			result = 1;
		} else { //Caso recursivo
			result = n * factorial(n - 1);
		}

		System.out.printf("Factorial1 de %d  Resultado: %d%n", n, result);

		return result;
	}

}
