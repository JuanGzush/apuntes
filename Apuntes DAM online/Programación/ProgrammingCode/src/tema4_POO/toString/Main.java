package tema4_POO.toString;

public class Main {

	public void showToString() {

		Vehicle vehicle;

		vehicle = new Vehicle(2, "azul");
		System.out.println(vehicle.toString());
		System.out.println(vehicle);//hace lo mismo que vehicle.toString()

	}

	public static void main(String[] args) {

		new Main().showToString();

	}

}
