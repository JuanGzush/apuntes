package tema4_POO.encapsulacion;

public class Main {

	public void showEncapsulation() {

		Vehicle car;
		car = new Vehicle(4, "azul");
		car.accelerate(90.54);
		System.out.printf("Velocidad: %.2f", car.getSpeed());
		car.speed = 120;//Error de compilación: el atributo speed no es visible

	}

	public static void main(String[] args) {

		new Main().showEncapsulation();

	}

}
