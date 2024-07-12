package tema6_2_ArraysMultidimensionales;

public class ArraysForEach {

	public void show() {

		//Array de dos dimensiones [3][5]
		int[][] twoDimensions = { { 0, 1, 2, 3, 4 }, { 5, 6, 7, 8, 9 }, { 10, 11, 12, 13, 14 } };
		//Recorrido del segundo array unidimensional del array bidimensional:
		for (int number : twoDimensions[1]) {
			System.out.printf("%d ", number);//5 6 7 8 9
		}
		System.out.println();
		for (int i = 0; i < twoDimensions.length; i++) {
			//Recorrido de los arrays unidimensionales que forman el array bidimensional
			for (int number : twoDimensions[i]) {
				System.out.printf("%d ", number);
			}
			System.out.println();
		}

	}

	public static void main(String[] args) {

		new ArraysForEach().show();

	}

}
