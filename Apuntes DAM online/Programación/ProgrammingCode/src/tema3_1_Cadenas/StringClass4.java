package tema3_1_Cadenas;

public class StringClass4 {

	public static void main(String[] args) {

		String string1 = "hola", string2 = "adios", string3 = "Hola", string4;

		//hola es mayor que adios
		System.out.println(string1.compareTo(string2) > 0 ? String.format("%s es mayor que %s", string1, string2)
				: String.format("%s es menor que %s", string1, string2));
		//adios es menor que hola
		System.out.println(string2.compareTo(string1) > 0 ? String.format("%s es mayor que %s", string2, string1)
				: String.format("%s es menor que %s", string2, string1));
		//En el Unicode, las mayúsculas están antes: Hola es menor que adios
		System.out.println(string3.compareTo(string2) > 0 ? String.format("%s es mayor que %s", string3, string2)
				: String.format("%s es menor que %s", string3, string2));
		//Hola es mayor que adios si no tenemos en cuenta las mayúsculas y minúsculas
		System.out.println(string3.compareToIgnoreCase(string2) > 0
				? String.format("%s es mayor que %s si no tenemos en cuenta las mayúsculas y minúsculas", string3,
						string2)
				: String.format("%s es menor que %s si no tenemos en cuenta las mayúsculas y minúsculas", string3,
						string2));

		System.out.println(string4 = string1.concat(" que tal"));//string4="hola que tal"
		System.out.println(string4.endsWith("tal"));//true
		System.out.println(string4.endsWith("hola"));//false
		System.out.println(string4.startsWith("hola"));//true
		System.out.println(string4.startsWith("tal"));//false

		System.out.println(string4.indexOf("hola"));//0
		System.out.println(string4.indexOf("tal"));//9
		System.out.println(string4.indexOf("que"));//5
		System.out.println(string4.indexOf(string2));//-1
		System.out.println(string4.indexOf(string3));//-1
		System.out.println(string4.indexOf('a'));//3
		System.out.println("hola que tal hola que tal".lastIndexOf("tal"));//22

		System.out.println(string4.isEmpty());//false
		System.out.println("".isEmpty());//true

		System.out.println("ole ".repeat(6));//ole ole ole ole ole ole 

		System.out.println(string4.replace('a', '*'));//hol* que t*l
		System.out.println("hola que tal hola que tal".replace("hola", "buenas"));//buenas que tal buenas que tal

		//Para hacer desaparecer partes de una cadena, se reemplazan por cadena vacía
		System.out.println("hola que tal hola que tal".replace(" ", ""));//holaquetalholaquetal

		System.out.println(string4.substring(9));//tal
		System.out.println(string4.substring(5, 8));//que

		System.out.println("HOLA QUE TAL".toLowerCase());//hola que tal
		System.out.println("hola que tal".toUpperCase());//HOLA QUE TAL
		System.out.println("       Hola que tal      ".trim());//Hola que tal

	}

}
