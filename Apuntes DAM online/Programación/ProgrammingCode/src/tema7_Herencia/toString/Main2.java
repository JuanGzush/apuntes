package tema7_Herencia.toString;

public class Main2 {

	public void showToString() {

		Vehicle vehicle;

		vehicle = new Vehicle(2, "azul");
		System.out.println(vehicle);//Se llama al toString del objeto

	}

	public static void main(String[] args) {

		new Main2().showToString();

	}

}
