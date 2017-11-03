import java.net.*;
import java.io.*;
public class URLcode1 {
	public static void main(String[] args) throws Exception {
		URL theURL = new URL("http://www.dal.ca");
		URLConnection theConn = theURL.openConnection();
		int contentLen = theConn.getContentLength();
		int c;
		if (contentLen != 0) {
			InputStream urlInput=theConn.getInputStream();
			while (((c = urlInput.read()) != -1)) {
				System.out.print((char) c);
			}
			urlInput.close();
		}
		else
		{
			System.out.println("Sorry, No content");
		}
	}
}