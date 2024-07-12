package tema10_Genericos;

public class GenericMethod {

	public static <T> String showType(T parameter) {//El genérico <T> se declara delante del tipo de devolución String
		return parameter.getClass().getSimpleName();
	}

	public static void main(String[] args) {

		System.out.printf("El tipo del parámetro es %s\n", GenericMethod.showType(80));
		System.out.printf("El tipo del parámetro es %s\n", GenericMethod.showType(78.6));
		System.out.printf("El tipo del parámetro es %s\n", GenericMethod.showType("Métodos genéricos"));
		System.out.printf("El tipo del parámetro es %s\n", GenericMethod.showType(new Vehicle(4, "azul")));

	}

}
