package tema6_1_ArraysUnidimensionales;

import java.util.Arrays;

public class Split {

	public void show() {

		String string = "Esto:es:una:cadena:dividida:por:split";
		String[] stringArray = string.split(":");
		System.out.println(Arrays.toString(stringArray));//[Esto, es, una, cadena, dividida, por, split]

	}

	public static void main(String[] args) {

		new Split().show();

	}

}
