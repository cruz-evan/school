<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model {

	protected $fillable =[
		'title',
		'description',
		'typet',
		'user_id'
	];
	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
