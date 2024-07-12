package tema1_4_TiposDeDatosPrimitivos;

public class Integers {

	public static void main(String[] args) {

		int i;
		long l;
		byte b;
		short s;

		i = 16;// 16 decimal
		System.out.println(i);
		i = 020;// 20 octal=16 decimal
		System.out.println(i);
		i = 0x10;// 10 hexadecimal=16 decimal
		System.out.println(i);
		i = 0b10000;// 10000 binario=16 decimal
		System.out.println(i);

		l = 6985742369L; // Si se le quita la L da error
		System.out.println(l);
		b = 127; // No da error porque está dentro del rango de los byte aunque el literal sea por defecto int
		System.out.println(b);
		s = 32767; // No da error porque está dentro del rango de los short aunque el literal sea por defecto int
		System.out.println(s);

		i = 1200;
		System.out.println(i);
		b = (byte) i;
		System.out.println(b); // El valor de b no tiene sentido

		// A partir de java7, se pueden usar guiones para facilitar la lectura al programador:
		System.out.println("Número: " + 1_000_000); // Salida en consola: Número: 1000000

	}

}
