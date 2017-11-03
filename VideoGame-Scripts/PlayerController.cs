using UnityEngine;
using System.Collections;
using UnityEngine.UI;
using UnityEngine.SceneManagement;

public class PlayerController : MonoBehaviour {

	//Variables

	public float speed;
	public float xRotation;
	public float mouseSensitivity=5.0f;
	public Vector3 still = new Vector3 (0.0f, 0.0f, 0.0f);
	public Text countText;
	public Text deathText;
	public Text killText;
	public Text winText;
	public Text leftText;

	private int count;
	private int kill;
	private int death;
	private int left;
	private bool gameOver;
	private Animator anim;
	private Rigidbody rb;
	private Scene currentScene;
	private string sceneName;


	void Start ()
	{
		currentScene = SceneManager.GetActiveScene ();
		sceneName = currentScene.name;
		rb = GetComponent<Rigidbody>();
		anim = GetComponent<Animator>();
		count = PlayerCharacter.Collected;
		kill = PlayerCharacter.Kills;
		death = PlayerCharacter.Deaths;
		left = 4;
		gameOver = false;
		SetCountText ();
		SetKillText ();
		SetDeathText ();
		SetLeftText ();
		winText.text = " ";
	}

	// Updates the character based on what keys are pressed
	void LateUpdate ()
	{
		float moveHorizontal = Input.GetAxis ("Horizontal");
		float moveVertical = Input.GetAxis ("Vertical");
		//Makes it so that mouse movement only moves the character around the y axis. 
		xRotation += Input.GetAxis ("Mouse X") * mouseSensitivity;

		Vector3 mouseRotation = new Vector3 (0, xRotation);

		transform.eulerAngles = mouseRotation;


		Vector3 movement = new Vector3 (moveHorizontal, 0.0f, moveVertical);

		//If the A key is pressed move left
		if (Input.GetKey (KeyCode.A)) {
			transform.Translate (Vector3.left * speed * Time.deltaTime);
			anim.SetBool ("isRunning", true);
		}
		//If the W key is pressed move Up
		if (Input.GetKey (KeyCode.W)) {
			transform.Translate (Vector3.forward * speed * Time.deltaTime); 
			anim.SetBool ("isRunning", true);
		}
		//If the D key is pressed move Right
		if (Input.GetKey (KeyCode.D)) {
			transform.Translate (Vector3.right * speed * Time.deltaTime); 
			anim.SetBool ("isRunning", true);
		}
		//If the S key is pressed move back
		if (Input.GetKey (KeyCode.S)) {
			transform.Translate (Vector3.back * speed * Time.deltaTime); 
			anim.SetBool ("isRunning", true);
		} 

		//If the velocity is to high, does not allow for a double jump
		if (rb.velocity.y < 2 && rb.velocity.y > -2) {
			//If the velocity was low enough allow for the Jump button (space) to be pushed
			//the character will then jump 
			if (Input.GetButtonDown ("Jump")) {
				rb.velocity = new Vector3 (rb.velocity.x, 8.0f, rb.velocity.z);
				anim.SetBool ("isJumping", true);
			}
		}
		//If the boolean gameOver is true it will set the win text
		if (gameOver) {
			SetWinText ();
		}

	}

	//If a trigger is entered this will run
	void OnTriggerEnter(Collider other)
	{
		//If the character runs into a fuel it will deactivate the fuel making it non-pickupable
		//It will then increase the amount of fuel in the inventory and decrease the amount left
		//It will then set the texts to notify the character
		if(other.gameObject.CompareTag("Pick Up"))
		{
			other.gameObject.SetActive(false);
			count += 1;
			left -= 1;
			SetCountText ();
			SetLeftText ();
		}
		//If the character hits a jump pad object it will be launced higher than a jump
		if (other.gameObject.CompareTag ("Jump Pad")) {
			rb.velocity = new Vector3 (rb.velocity.x, 16.0f, rb.velocity.z);
		}
		//If the character falls off a platform it will be reset at the spawn point and increase the death count
		if (other.gameObject.CompareTag ("Death")) {
			rb.transform.position = new Vector3 (1083, 56, 645.6f);
			death += 1;
			SetDeathText ();
		}
		//if it hits an enemy it will kill it as long as it's high enough above the enemy and increase the kill count
		//if it is not high enough the character will respawn and the death count will increase
		if (other.gameObject.CompareTag ("Enemy")) {
			if (rb.transform.position.y > other.gameObject.transform.position.y - .1) {
				other.gameObject.SetActive (false);
				kill += 1;
				SetKillText ();
			} 
			else {
				rb.transform.position = new Vector3 (1083, 56, 645.6f);
				death += 1;
				SetDeathText ();
			}
		}
	}
	//Sets the Count text and if all of the fuel is collected it will change scenes and save the stats
	//if all the fuel in both scenes is collected it will end the game
	void SetCountText()
	{
		countText.text = "Fuel: " + count.ToString();
		if (count == 4 && sceneName != "Scene2") {
			PlayerCharacter.Collected = count;
			PlayerCharacter.Kills = kill;
			PlayerCharacter.Deaths = death;
			SceneManager.LoadScene ("Scene2");
		}
		if (count == 8) {
			gameOver = true;
		}
	}
	void SetKillText()
	{
		killText.text = "Kills: " + kill.ToString();
	}
	void SetDeathText()
	{
		deathText.text = "Deaths: " + death.ToString(); 
	}
	void SetWinText()
	{
		winText.text = "YOU WIN!"; 
	}
	void SetLeftText()
	{
		leftText.text = "Fuel Left: " + left.ToString ();
	}
}
