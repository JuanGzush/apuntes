package tema10_Genericos;

public class GenNumeric<T extends Number> { //Limitamos T a tipos numéricos

	private T attribute;

	public GenNumeric(T attribute) {
		this.attribute = attribute;

	}

	public T getAttribute() {
		return attribute;
	}

	double fraction() {
		return attribute.doubleValue() - attribute.intValue(); //Se pueden emplear métodos de la clase Number
	}

	public static void main(String[] args) {

		GenNumeric<Integer> genInteger;
		GenNumeric<Double> genDouble;

		genInteger = new GenNumeric<Integer>(80);
		genDouble = new GenNumeric<Double>(78.63);

		System.out.printf("La parte decimal de %s es %.2f\n", genInteger.getAttribute(), genInteger.fraction());
		System.out.printf("La parte decimal de %s es %.2f\n", genDouble.getAttribute(), genDouble.fraction());

	}

}
