package tema3_2_ExpresionesRegulares;

public class CharactersClasses {

	public static void main(String[] args) {

		System.out.println("a".matches("[abc]"));//true
		System.out.println("d".matches("[abc]"));//false
		System.out.println("a".matches("[abc][abc]"));//false
		System.out.println("ac".matches("[abc][abc]"));//true
		System.out.println("ad".matches("[abc][abc]"));//false
		System.out.println(" a".matches("[abc ][abc]"));//true

		System.out.println("d".matches("[^abc]"));//true
		System.out.println("a".matches("[^abc]"));//false
		System.out.println("d".matches("[^abc][^abc]"));//false
		System.out.println("de".matches("[^abc][^abc]"));//true
		System.out.println("da".matches("[^abc][^abc]"));//false

		System.out.println("A".matches("[a-zA-Z]"));//true
		System.out.println("9".matches("[a-zA-Z]"));//false
		System.out.println("A".matches("[a-zA-Z][a-zA-Z]"));//false
		System.out.println("Az".matches("[a-zA-Z][a-zA-Z]"));//true
		System.out.println("A9".matches("[a-zA-Z][a-zA-Z]"));//false

		System.out.println("b".matches("[a-d[m-p]]"));//true
		System.out.println("n".matches("[a-d[m-p]]"));//true
		System.out.println("s".matches("[a-d[m-p]]"));//false

		System.out.println("d".matches("[a-z&&[def]]"));//true
		System.out.println("a".matches("[a-z&&[def]]"));//false

		System.out.println("d".matches("[a-z&&[^bc]]"));//true
		System.out.println("b".matches("[a-z&&[^bc]]"));//false

		System.out.println("d".matches("[a-z&&[^m-p]]"));//true
		System.out.println("n".matches("[a-z&&[^m-p]]"));//false

	}

}
