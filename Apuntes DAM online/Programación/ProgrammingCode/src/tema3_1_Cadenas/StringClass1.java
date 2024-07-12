package tema3_1_Cadenas;

public class StringClass1 {

	public static void main(String[] args) {

		String formattedString;
		formattedString = String.format("Nombre: %s Edad: %d Sueldo: %.2f", "Juan", 20, 1896.23);
		System.out.println(formattedString);

	}

}
