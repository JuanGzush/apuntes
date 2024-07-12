package tema8_TiposEnumerados.ordinal;

public enum Operation {

	PLUS(1, "+"), MINUS(2, "-"), TIMES(3, "*"), DIVIDE(4, "/");

	private final int optionNumber;
	private final String symbol;

	private Operation(int optionNumber, String symbol) {
		this.optionNumber = optionNumber;
		this.symbol = symbol;
	}

	public String getSymbol() {
		return symbol;
	}

	public int getOptionNumber() {
		return optionNumber;
	}

}
