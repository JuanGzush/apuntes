package tema3_2_ExpresionesRegulares;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class Point {

	public static void main(String[] args) {

		Pattern pattern = Pattern.compile(".", Pattern.DOTALL);
		Matcher matcher = pattern.matcher("\n");
		System.out.println(matcher.matches());//true

		System.out.println("\n".matches("."));//false

	}

}
