
public class GravityConstant implements GravityModel{
	protected double GravField;
	public GravityConstant(double g)
	{
		GravField=g;		
	}
	@Override
	public double getGravitationalField() {
	   return GravField;
	}
}
