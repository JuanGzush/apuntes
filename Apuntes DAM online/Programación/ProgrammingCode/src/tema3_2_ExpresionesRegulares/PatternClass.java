package tema3_2_ExpresionesRegulares;

import java.util.regex.Pattern;

public class PatternClass {

	public static void main(String[] args) {

		Pattern pattern = Pattern.compile("\\p{Upper}\\p{Lower}");
		System.out.println(pattern.pattern());//\p{Upper}\p{Lower}

		System.out.println(Pattern.matches("\\p{Upper}\\p{Lower}", "Ho"));//true
		System.out.println(Pattern.matches("\\p{Upper}\\p{Lower}", "ho"));//false

	}

}
