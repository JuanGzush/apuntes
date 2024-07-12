package tema6_1_ArraysUnidimensionales;

public class ArrayIndexOutOfBoundsException1 {

	public void show() {

		int[] grades = { 8, 7, 9 };

		for (int i = 0; i <= grades.length; i++) {
			System.out.printf("Nota en el índice %d: %d\n", i, grades[i]);
		}

	}

	public static void main(String[] args) {

		new ArrayIndexOutOfBoundsException1().show();

	}

}
