package tema1_10_LecturaPorTeclado;

import java.util.Locale;
import java.util.Scanner;

public class ScannerClassLocale {

	@SuppressWarnings("resource")
	public static void main(String[] args) {

		Scanner keyboard = new Scanner(System.in).useLocale(Locale.US);
		float f;
		// Debido al useLocale(Locale.US), el símbolo separador de decimales será el .
		f = keyboard.nextFloat();
		System.out.println(f);

	}

}
