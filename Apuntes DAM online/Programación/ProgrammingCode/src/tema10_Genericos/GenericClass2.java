package tema10_Genericos;

public class GenericClass2<T> implements GenericInterface<T> {

	@Override
	public T first(T[] array) {
		return array[0];
	}

	@Override
	public T last(T[] array) {
		return array[array.length - 1];
	}

	public static void main(String[] args) {

		Vehicle[] array = new Vehicle[3];
		array[0] = new Vehicle(4, "azul");
		array[1] = new Vehicle(4, "blanco");
		array[2] = new Vehicle(2, "rojo");
		GenericClass2<Vehicle> genVehicle = new GenericClass2<>();
		System.out.printf("Primer vehículo del array: %s\n", genVehicle.first(array));
		System.out.printf("Último vehículo del array: %s", genVehicle.last(array));

	}

}
