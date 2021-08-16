<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileHistory extends Model
{
    // ProfileHistory Modelを扱う時、idは代入されないようにする
    protected $guarded = array('id');
    
    // Validationのルールの宣言
	public static $rules = array(
		'profile_id' => 'required',
		'edited_at' => 'required',
	);
}