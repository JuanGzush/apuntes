package tema8_TiposEnumerados.implementacionInterfaces;

public enum ExtendedOperation implements Operation {

	EXP("^") {
		@Override
		public double apply(double x, double y) {
			return Math.pow(x, y);
		}
	},
	REMAINDER("%") {
		@Override
		public double apply(double x, double y) {
			return x % y;
		}
	};

	private final String symbol;

	private ExtendedOperation(String symbol) {
		this.symbol = symbol;
	}

	@Override
	public String getSymbol() {
		return symbol;
	}

}
