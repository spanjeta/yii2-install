<?php

namespace spanjeta\modules\install\controllers;

use yii;
use yii\web\Controller;
use yii\base\Model;
use spanjeta\modules\install\models\SetupDb;
use spanjeta\modules\install\Install;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\base\Object;
use yii\helpers\Url;
use spanjeta\modules\install\models\SystemCheck;
use app\models\User;
use yii\helpers\FileHelper;

/**
 * Default controller for the `install` module
 */
class DefaultController extends Controller {
	/**
	 * Renders the index view for the module
	 *
	 * @return string
	 */
	public function actionIndex() {
		return $this->render ( '_index' );
	}
	public function actionGo() {
		$checks = SystemCheck::getResults ();
		
		$hasError = FALSE;
		foreach ( $checks as $check ) {
			if ($check ['state'] == 'ERROR')
				$hasError = TRUE;
		}
		
		// Render template
		return $this->render ( '_check', [ 
				'checks' => $checks,
				'hasError' => $hasError 
		] );
	}
	public function execSqlFile($sqlFile) {
		$message = "file not found";
		
		if (file_exists ( DB_BACKUP_FILE_PATH.DIRECTORY_SEPARATOR.$sqlFile )) {
			$sqlArray = file_get_contents ( DB_BACKUP_FILE_PATH.DIRECTORY_SEPARATOR.$sqlFile  );
			
			$cmd = \Yii::$app->db->createCommand ( $sqlArray );
			try {
				$cmd->execute ();
				$message = 'ok';
			} catch ( \Exception $e ) {
				$message = $e->getMessage ();
			}
		}
		
		return $message;
	}
	
	/*
	 * STEP 2
	 * CONFIGURE THE DATABASE FILE
	 * Setupdb
	 */
	public function actionStep2() {
		$model = new SetupDb ();
		$success = true;
		
		if ($model->load ( Yii::$app->request->post () )) {
			
			$model->setAttributes ( $_POST ['SetupDb'] );
			
			try {
				
				$db = \Yii::$app->set ( 'db', [ 
						'class' => 'yii\db\Connection',
						'dsn' => "mysql:host=$model->host;dbname=$model->db_name",
						'emulatePrepare' => true,
						'username' => $model->username,
						'password' => $model->password,
						'charset' => 'utf8',
						'tablePrefix' => $model->table_prefix 
				] );
			} catch ( Exception $e ) {
				$success = false;
			}
			
			if ($success) {
				
				$text_file = "<?php
				return [
				'class' => 'yii\db\Connection',
				'dsn' => 'mysql:host=$model->host;dbname=$model->db_name',
				'emulatePrepare' => true,
				'username' => '$model->username',
				'password' => '$model->password',
				'charset' => 'utf8',
				'tablePrefix' => '$model->table_prefix',
				];";
				
				try {
					
					file_put_contents ( DB_CONFIG_FILE_PATH, $text_file );
				
					$message = $this->execSqlFile ( $this->module->sqlfile );
					
					if ($message == 'ok') {
						$count = User::find ()->count ();
						if ($count == 0) {
							\Yii::$app->session->setFlash ( 'success', 'Database setup successfully!' );
								return $this->redirect ( [ 
									'/user/add-admin' 
							] );
						} else {						
							return $this->redirect ( [ 
									'/user/login' 
							] );
						}
					} else {
						unlink ( DB_CONFIG_FILE_PATH );
						\Yii::$app->session->setFlash ( 'error', $message );
					}
				} catch ( Exception $e ) {
					unlink ( DB_CONFIG_FILE_PATH );
					\Yii::$app->session->setFlash ( 'error', 'Unable to setup Database.' );
					// echo $e->getTraceAsString ();
				}
			} else {
				\Yii::$app->session->setFlash ( 'error', 'database not ready' );
			}
		}
		return $this->render ( 'database', [ 
				'model' => $model 
		] );
	}
}
