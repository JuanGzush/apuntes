package tema7_Herencia.toString;

public class Main1 {

	public void showToString() {

		Vehicle vehicle;

		vehicle = new Vehicle(2, "azul");
		System.out.println(vehicle.toString());

	}

	public static void main(String[] args) {

		new Main1().showToString();

	}

}
