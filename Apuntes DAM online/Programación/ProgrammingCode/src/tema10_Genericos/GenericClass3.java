package tema10_Genericos;

public class GenericClass3<T, V> {

	private T attribute1;
	private V attribute2;

	public GenericClass3(T attribute1, V attribute2) {
		this.attribute1 = attribute1;
		this.attribute2 = attribute2;
	}

	public T getAttribute1() {
		return attribute1;
	}

	public V getAttribute2() {
		return attribute2;
	}

	public void show() {
		System.out.printf("El tipo de T es %s", attribute1.getClass().getSimpleName());
		System.out.printf("  --->  Valor del atributo: %s\n", getAttribute1());
		System.out.printf("El tipo de V es %s", attribute2.getClass().getSimpleName());
		System.out.printf("  --->  Valor del atributo: %s\n\n", getAttribute2());

	}

	public static void main(String[] args) {

		GenericClass3<Integer, Integer> variousGenerics1 = new GenericClass3<>(80, 56);
		GenericClass3<Integer, Double> variousGenerics2 = new GenericClass3<>(5, 78.6);
		GenericClass3<String, Vehicle> variousGenerics3 = new GenericClass3<>("Clases genéricas",
				new Vehicle(4, "azul"));
		variousGenerics1.show();
		variousGenerics2.show();
		variousGenerics3.show();
	}

}
