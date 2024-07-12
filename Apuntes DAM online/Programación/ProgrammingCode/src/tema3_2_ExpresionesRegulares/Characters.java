package tema3_2_ExpresionesRegulares;

public class Characters {

	public static void main(String[] args) {

		System.out.println("a".matches("a"));//true
		System.out.println("b".matches("a"));//false
		System.out.println("A".matches("\u0041"));//true	
		System.out.println("\n".matches("\n"));//true
		System.out.println("\t".matches("\t"));//true
		System.out.println("\\".matches("\\\\"));//true

	}

}
