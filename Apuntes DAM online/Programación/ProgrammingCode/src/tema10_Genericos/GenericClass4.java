package tema10_Genericos;

import java.util.Arrays;

public class GenericClass4<T> {

	private T[] array;

	GenericClass4(T[] array) {
		this.array = array;
	}

	public void showArray() {
		System.out.println(Arrays.toString(array));
	}

	public boolean equalSize(GenericClass4<T> gen) {
		return array.length == gen.array.length;
	}

	public static void main(String[] args) {

		Integer[] array1 = { 8, 7, 9 };
		Integer[] array2 = { 3, 5, 12 };
		GenericClass4<Integer> gen1 = new GenericClass4<>(array1);
		GenericClass4<Integer> gen2 = new GenericClass4<>(array2);
		gen1.showArray();
		gen2.showArray();
		System.out.printf("%s tienen el mismo tamaño", gen1.equalSize(gen2) ? "Sí" : "No");

	}

}
