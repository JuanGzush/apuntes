package tema8_TiposEnumerados.implementacionInterfaces;

public enum BasicOperation implements Operation {

	PLUS("+") {
		@Override
		public double apply(double x, double y) {
			return x + y;
		}
	},
	MINUS("-") {
		@Override
		public double apply(double x, double y) {
			return x - y;
		}
	},
	TIMES("*") {
		@Override
		public double apply(double x, double y) {
			return x * y;
		}
	},
	DIVIDE("/") {
		@Override
		public double apply(double x, double y) {
			return x / y;
		}
	};

	private final String symbol;

	private BasicOperation(String symbol) {
		this.symbol = symbol;
	}

	@Override
	public String getSymbol() {
		return symbol;
	}

}