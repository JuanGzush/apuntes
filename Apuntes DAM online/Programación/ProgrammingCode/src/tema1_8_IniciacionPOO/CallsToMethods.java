package tema1_8_IniciacionPOO;

public class CallsToMethods {

	public void showCallsToMethods() {

		Boolean b;
		String string;

		string = "EntornosDeDesarrollo";
		System.out.println(string.substring(10).toUpperCase()); //DESARROLLO

		b = Boolean.TRUE;
		System.out.println(b.toString().charAt(2)); //u

	}

	public static void main(String[] args) {

		new CallsToMethods().showCallsToMethods();

	}

}
