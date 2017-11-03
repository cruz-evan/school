import java.io.*;
import java.net.*;
public class ServerListen 
{
	public static void main(String[] args) throws Exception {
		ServerSocket serverSock=null;
		try
		{
			serverSock=new ServerSocket(10007);
		}
		catch (IOException ie) 
		{
			 System.out.println("Cannot listen on 10007");
			 System.exit(1);
		}
		Socket clientSock= null;
		System.out.println("waiting for connection....");
		try
		{
			clientSock = serverSock.accept();
		}
		catch (IOException ie) 
		{
			 System.out.println("Could not connect");
			 System.exit(1);
		}
		System.out.println("connection sccesful");
		System.out.println("waiting for input....");
		PrintWriter output = new PrintWriter(clientSock.getOutputStream(), true);
		BufferedReader input = new BufferedReader(new InputStreamReader(clientSock.getInputStream()));
		String inputLine;
		while ((inputLine = input.readLine()) != null) 
		{
			 System.out.println("Server: " + inputLine);
			 output.println(inputLine);
			 if (inputLine.equals("Bye")) 
			 {
				 break;
			 }
		}
		output.close();
		input.close();
		clientSock.close();
		serverSock.close();

	}
	public static Socket FTProutine(String host, int portNum, boolean ActOrPass)
	{
		if(!ActOrPass)
		{
			ServerSocket serverSock=null;
			Socket sock= null;
			try
			{
				serverSock=new ServerSocket(portNum);
			}
			catch (IOException ie) 
			{
				 System.out.println("Cannot listen on:"+portNum);
				 System.exit(1);
			}
			System.out.println("waiting for connection....");
			try
			{
				sock = serverSock.accept();
			}
			catch (IOException ie) 
			{
				 System.out.println("Could not connect");
				 System.exit(1);
			}
			return sock;
		}
		else
		{
			Socket sock= null;
			try 
			{
				 sock = new Socket(host, portNum);
			}
			catch (UnknownHostException e) 
			{
				 System.out.println("Unknown host");
				 System.exit(1);
			}
			catch (IOException ie) 
			{
				 System.out.println("Cannot connect to host");
				 System.exit(1);
			}
			return sock;
		}
	}
}
