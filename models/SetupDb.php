<?php

namespace spanjeta\modules\install\models;

use yii\base\Model;
use yii\db\BaseActiveRecord;

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class SetupDb extends Model {
	public $username;
	public $email;
	public $password = '';
	public $rememberMe;
	private $_identity;
	public $device_token;
	public $device_type;
	public $host = 'localhost';
	public $db_name;
	public $table_prefix = 'tbl_';
	public $port = '3306';
	
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules() {
		/*
		 * if(!isset($this->scenario))
		 * $this->scenario = 'login';
		 */
		return [
				// username and password are required
				[ 
						[ 
								'username',
								'host',
								'db_name',
						],
						'required' 
				],
				[ 
						[ 
								'email',
								 
						],
						'email' 
				],
				[ 
						[ 
								'port',
								'password',
								'table_prefix' 
						],
						'safe' 
				],
				// rememberMe needs to be a boolean
				// array('device_token,device_type', 'length', 'max'=>256),
				[ 
						'rememberMe',
						'boolean' 
				] 
		];
	}
	
	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels() {
		return [ 
				'rememberMe' => 'Keep me logged in' 
		];
	}
}
