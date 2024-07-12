package tema3_2_ExpresionesRegulares;

public class LogicalOperators {

	public static void main(String[] args) {

		System.out.println("hola".matches("hola"));//true
		System.out.println("hol".matches("hola"));//false

		System.out.println("hola".matches("hola|adios"));//true
		System.out.println("adios".matches("hola|adios"));//true
		System.out.println("hol".matches("hola|adios"));//false
		System.out.println("Adios".matches("hola|adios"));//false

	}

}
