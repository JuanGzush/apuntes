package tema4_POO.constructores1;

public class Main {

	public void showConstructors1() {

		Vehicle car, moto;
		car = new Vehicle();
		moto = new Vehicle(2, "rojo");
		System.out.printf("Coche: %d ruedas y de color %s", car.getWheelCount(), car.getColour());
		System.out.printf("\nMoto: %d ruedas y de color %s", moto.getWheelCount(), moto.getColour());

	}

	public static void main(String[] args) {

		new Main().showConstructors1();

	}

}
