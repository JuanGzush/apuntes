package tema5_1_Excepciones;

public class StringIndexOutOfBoundsException1 {

	public void show() {

		String string = "hola";
		for (int i = 0; i <= string.length(); i++) {
			System.out.println(string.charAt(i));
		}

	}

	public static void main(String[] args) {

		new StringIndexOutOfBoundsException1().show();

	}

}
