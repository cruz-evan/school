using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class MovingPlatform : MonoBehaviour {
	public float moveSpeed;

	private int distance=0;

	void Update () {
		//If moves less than 400 it will move the object forward
		if (distance < 400) {
			transform.Translate (Vector3.forward * moveSpeed * Time.deltaTime);
			distance += 1;
		//If moves less than 800 it will move the object backward
		} else if (distance < 800) {
			transform.Translate (Vector3.back * moveSpeed * Time.deltaTime);
			distance += 1;
		//if it is above 800 the distance will reset to 0
		} else {
			distance = 0;
		}
	}
}
