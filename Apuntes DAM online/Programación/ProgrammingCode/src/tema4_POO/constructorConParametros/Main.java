package tema4_POO.constructorConParametros;

public class Main {

	public void showParameterizedConstructor() {

		Vehicle car, moto;
		car = new Vehicle(4, "azul");
		moto = new Vehicle(2, "rojo");
		System.out.printf("Coche: %d ruedas y de color %s", car.getWheelCount(), car.getColour());
		System.out.printf("\nMoto: %d ruedas y de color %s", moto.getWheelCount(), moto.getColour());

	}

	public static void main(String[] args) {

		new Main().showParameterizedConstructor();

	}

}
