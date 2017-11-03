
public class Validate {
	protected String pass;
	public void validate(){
		pass="password1";
		//makes sure all passwords are more than 8 characters
		if(pass.length() <8){
			System.exit(-1);
		}
		//makes sure the password is not equal to password regardless of casing
		else if(pass.equalsIgnoreCase("password")){
			System.exit(-1);
		}
		
	}
}
