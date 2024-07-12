package tema4_POO.constructorPorDefecto;

public class Vehicle {

	private int wheelCount;
	private double speed;
	private String colour;

	public Vehicle() { //No se especifica tipo de retorno
		wheelCount = 4;
		speed = 0;
		colour = "blanco";
	}

	public int getWheelCount() {
		return wheelCount;
	}

	public double getSpeed() {
		return speed;
	}

	public String getColour() {
		return colour;
	}

	public void setColour(String colour) {
		this.colour = colour;
	}

	public void accelerate(double amount) {
		speed += amount;
	}

	public void brake(double amount) {
		speed -= amount;
	}

}