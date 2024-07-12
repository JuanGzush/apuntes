package tema3_2_ExpresionesRegulares;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class Replace {

	public static void main(String[] args) {

		Pattern pattern = Pattern.compile("\\d");
		Matcher matcher = pattern.matcher("Tengo 20 años y vivo en la calle Puerto Real 15");

		String replaceAll = matcher.replaceAll("*");
		String replaceFirst = matcher.replaceFirst("*");

		System.out.printf("replaceAll: %s\n", replaceAll);
		System.out.printf("replaceFirst: %s\n", replaceFirst);

	}

}
