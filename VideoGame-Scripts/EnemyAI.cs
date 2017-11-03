using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class EnemyAI : MonoBehaviour {
	public float enemySpeed;
	private Rigidbody rb;

	void Start () {
		rb = GetComponent<Rigidbody>();
	}
	

	void Update () {
		Vector3 dwn = transform.TransformDirection (Vector3.down);

		//Creates a raycast to see when the ship is near an edge
		//It will rotate if it is too close and then move forward
		if(! Physics.Raycast(transform.position, dwn, 10))
		{
			transform.Rotate(new Vector3(0,15,0));
			transform.Translate (Vector3.forward * enemySpeed * Time.deltaTime);
		}
		//It will move forward if it is not near an edge
		else
		{
			transform.Translate (Vector3.forward * enemySpeed * Time.deltaTime);	
		}
		
	}
}
