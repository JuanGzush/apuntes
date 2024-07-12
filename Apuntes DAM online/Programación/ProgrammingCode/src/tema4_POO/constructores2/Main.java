package tema4_POO.constructores2;

public class Main {

	public void showConstructors2() {

		Vehicle moto;
		Vehicle car = new Vehicle();//Error de compilación: el constructor myClass() no está definido
		moto = new Vehicle(2, "rojo");
		System.out.printf("Coche: %d ruedas y de color %s", car.getWheelCount(), car.getColour());
		System.out.printf("\nMoto: %d ruedas y de color %s", moto.getWheelCount(), moto.getColour());

	}

	public static void main(String[] args) {

		new Main().showConstructors2();

	}

}
