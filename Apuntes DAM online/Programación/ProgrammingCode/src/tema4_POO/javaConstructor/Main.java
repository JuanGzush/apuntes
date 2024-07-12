package tema4_POO.javaConstructor;

public class Main {

	public void showJavaConstructor() {

		Vehicle car;
		car = new Vehicle();
		System.out.printf("Color: %s", car.getColour());
		System.out.printf("\n%d ruedas", car.getWheelCount());
		System.out.printf("\nVelocidad: %.2f km/h", car.getSpeed());

	}

	public static void main(String[] args) {

		new Main().showJavaConstructor();

	}

}
