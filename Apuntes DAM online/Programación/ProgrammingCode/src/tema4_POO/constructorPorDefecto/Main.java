package tema4_POO.constructorPorDefecto;

public class Main {

	public void showDefaultConstructor() {

		Vehicle car1, car2;
		car1 = new Vehicle();
		car2 = new Vehicle();
		System.out.printf("Coche1: %d ruedas y de color %s", car1.getWheelCount(), car1.getColour());
		System.out.printf("\nCoche2: %d ruedas y de color %s", car2.getWheelCount(), car2.getColour());
		System.out.printf("\nVelocidad del coche1: %.2f km/h", car1.getSpeed());
		System.out.println("\nAceleramos el coche1 90,50 km/h");
		car1.accelerate(90.5);
		System.out.printf("Velocidad del coche1: %.2f km/h", car1.getSpeed());
		System.out.println("\nFrenamos el coche1 20,30 km/h");
		car1.brake(20.30);
		System.out.printf("Velocidad del coche1: %.2f km/h", car1.getSpeed());

	}

	public static void main(String[] args) {

		new Main().showDefaultConstructor();

	}

}
