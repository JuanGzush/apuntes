package tema1_10_LecturaPorTeclado;

import java.util.Scanner;

public class ScannerClass {

	@SuppressWarnings("resource")
	public static void main(String[] args) {
		/*
		 * La JVM (máquina virtual de Java) cierra el teclado cuando la aplicación termina,
		 * por lo tanto, no hace falta que lo cerremos. Para que no nos salga el warning, 
		 * añadimos @SuppressWarnings("resource")
		 */
		Scanner keyboard = new Scanner(System.in);
		String string;
		int i;
		float f;
		boolean b;

		string = keyboard.nextLine();
		System.out.println(string);
		i = keyboard.nextInt();
		System.out.println(i);
		b = keyboard.nextBoolean();
		System.out.println(b);
		/*
		 * El símbolo separador de decimales será la coma si nuestro idioma por defecto
		 * del sistema operativo está configurado en español:
		 */
		f = keyboard.nextFloat();
		System.out.println(f);

	}

}
