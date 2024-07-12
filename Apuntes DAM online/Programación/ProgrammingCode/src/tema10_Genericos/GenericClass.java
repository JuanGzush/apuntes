package tema10_Genericos;

public class GenericClass<T> {//Clase genérica de tipo T

	private T attribute;//Declaramos un atributo de tipo T

	public GenericClass(T attribute) {
		this.attribute = attribute;

	}

	public T getAttribute() {
		return attribute;
	}

	public void show() {
		System.out.printf("El tipo de T es %s", attribute.getClass().getSimpleName());
		System.out.printf("  --->  Valor del atributo: %s\n", getAttribute());
	}

	public static void main(String[] args) {

		//T es un parámetro de tipo que se sustituye por un tipo real al crear un objeto de la clase
		GenericClass<Integer> genInteger;//Se sustituye T por Integer
		GenericClass<Double> genDouble;//Se sustituye T por Double
		GenericClass<String> genString;//Se sustituye T por String
		GenericClass<Vehicle> genVehicle;//Se sustituye T por Vehicle

		genInteger = new GenericClass<Integer>(80);
		genDouble = new GenericClass<Double>(78.6);
		genString = new GenericClass<String>("Clases genéricas");
		genVehicle = new GenericClass<Vehicle>(new Vehicle(4, "azul"));

		genInteger.show();
		genDouble.show();
		genString.show();
		genVehicle.show();

	}

}
