/**
 * Represents a pendulum
 */
public class RegularPendulum extends AbstractPendulum {
    private double delta, iterations = 0;
    private double dissipation;
    private double lastTheta, lastVel, lastAccel;
    private GravityModel GravityMod;

    /**
     * Creates a new Pendulum instance 
     */
    public RegularPendulum (double inLength, double inMass, double inTheta0, 
		     GravityModel inDelta, double inDiss) {
	super (inLength, inMass, inTheta0);
	GravityMod=inDelta;
	dissipation = inDiss;
	lastVel = 0;
	lastTheta = this.getMaxAngularDisplacement ();
	lastAccel = -(this.getGravitationalField () / this.getStringLength ())*Math.sin (lastTheta);
    }

    public RegularPendulum (double inLength, double inMass, double inTheta0, 
		     GravityModel inDelta) {
	this (inLength, inMass, inTheta0, inDelta, 0);
    }
    
    public void setGravityModel(GravityModel grav)
    {
    	this.GravityMod=grav;
    }
    
    public GravityModel getGravityModel()
    {
    	return GravityMod;
    }

    public void step () {
	iterations++;
	lastTheta = lastTheta + lastVel*GravityMod.getGravitationalField();
	lastVel = lastVel + lastAccel*GravityMod.getGravitationalField();
	lastAccel = - dissipation*lastVel - this.getGravitationalField () / this.getStringLength () * Math.sin (lastTheta);
    }

    public double getLastTheta () { return lastTheta; }
    public double getLastVelocity () { return lastVel; }
    public double getLastAcceleration () { return lastAccel; }
    public double getLastTime () { return iterations*delta; }
    public double getDissipationConstant () { return dissipation; }
    

}
