package tema1_4_TiposDeDatosPrimitivos;

public class Characters {

	public static void main(String[] args) {

		char character;

		character = 'C'; // Los literales carácter van entre comillas simples
		System.out.println(character);
		character = 67; // El código Unicode de la C es el 67. Esta línea hace lo mismo que character='C'
		System.out.println(character);
		character = '\u0043'; // El código Unicode de la C en hexadecimal es el 0043. Esta línea hace lo mismo que character='C'
		System.out.println(character);
		character = '\n'; // Carácter especial Nueva línea
		System.out.println(character);
		character = '\''; // Carácter especial Comillas simples
		System.out.println(character);
		character = '\"'; // Carácter especial Dobles comillas
		System.out.println(character);
		character = '"'; // Carácter especial Dobles comillas se puede utilizar sin el carácter de escape en un literal carácter
		System.out.println(character);
		character = '\\'; // Carácter especial Barra inclinada
		System.out.println(character);
		character = 9752; // Código decimal del carácter trébol
		System.out.println(character);
		character = '\u2618';// Código hexadecimal del carácter trébol
		System.out.println(character);
		character = '☘';// Carácter trébol
		System.out.println(character);

	}

}
