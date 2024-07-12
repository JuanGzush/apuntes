package tema1_8_IniciacionPOO;

public class StringClass2 {

	public static void main(String[] args) {

		String string = "hola";
		System.out.println(string.charAt(0));//h
		System.out.println(string.charAt(1));//o
		System.out.println(string.charAt(2));//l
		System.out.println(string.charAt(3));//a
		System.out.println(string.length());//4
		System.out.println(string.equals("hola"));//true
		System.out.println(string.equals("adiós"));//false

		//También se le pueden aplicar métodos a un literal cadena:
		System.out.println("hola".equals("hola")); //true
		System.out.println("adios".equals("hola"));//false

	}

}
