using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class MouseHover : MonoBehaviour {

	void Start(){
		gameObject.GetComponent<Renderer>().material.color = Color.white;
	}
	void OnMouseEnter(){
		gameObject.GetComponent<Renderer>().material.color = Color.black;
	}

	void OnMouseExit() {
		gameObject.GetComponent<Renderer>().material.color = Color.white;
	}
	void OnMouseUp(){
		SceneManager.LoadScene ("Scene1");
	} 
		
}
