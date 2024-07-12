package tema10_Genericos;

import java.util.Arrays;

public class GenericClass5<T> {

	private T[] array;

	GenericClass5(T[] array) {
		this.array = array;
	}

	public void showArray() {
		System.out.println(Arrays.toString(array));
	}

	public boolean equalSize(GenericClass5<?> gen) {//Tipo comodín
		return array.length == gen.array.length;
	}

	public static void main(String[] args) {

		Integer[] array1 = { 8, 7, 9 };
		Double[] array2 = { 3.6, 5.4, 12.42 };
		GenericClass5<Integer> gen1 = new GenericClass5<>(array1);
		GenericClass5<Double> gen2 = new GenericClass5<>(array2);
		gen1.showArray();
		gen2.showArray();
		System.out.printf("%s tienen el mismo tamaño", gen1.equalSize(gen2) ? "Sí" : "No");

	}

}
