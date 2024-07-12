package tema8_TiposEnumerados;

public enum Operation {

	PLUS("+"), MINUS("-"), TIMES("*"), DIVIDE("/");//El ; es necesario cuando se definen atributos, constructores, etc..

	private final String symbol;

	private Operation(String symbol) {
		this.symbol = symbol;
	}

	public String getSymbol() {
		return symbol;
	}

}
