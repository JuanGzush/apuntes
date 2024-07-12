package tema5_1_Excepciones;

public class StringIndexOutOfBoundsException2 {

	public void show() {

		String string = "hola";
		try {
			for (int i = 0; i <= string.length(); i++) {
				System.out.println(string.charAt(i));
			}
		} catch (StringIndexOutOfBoundsException e) {//Esto no se debe hacer
			System.out.println("Esto no se debe hacer");
		}

	}

	public static void main(String[] args) {

		new StringIndexOutOfBoundsException2().show();

	}

}
