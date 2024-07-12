package tema11_Colecciones.enumMap;

public enum Operation {

	PLUS("+"), MINUS("-"), TIMES("*"), DIVIDE("/");

	private final String symbol;

	private Operation(String symbol) {
		this.symbol = symbol;
	}

	public String getSymbol() {
		return symbol;
	}

}
