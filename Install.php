<?php

namespace spanjeta\modules\install;
define('SQL_FILE_PATH',__DIR__.'/db/install.sql');
/**
 * install module definition class
 */
class Install extends \yii\base\Module {
	public $sqlfile = SQL_FILE_PATH;
	public $layout = 'installer';
	/**
	 * @inheritdoc
	 */
	public $controllerNamespace = 'spanjeta\modules\install\controllers';
	
	/**
	 * @inheritdoc
	 */
	public function init() {
		
		parent::init ();
		
		// custom initialization code goes here
	}
}
