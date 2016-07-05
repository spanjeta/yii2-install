<?php
use yii\helpers\Url;
?>

<div id="database-form" class="panel panel-default">
<div class="alert alert-wrapper">
<?php if(Yii::$app->session->hasFlash('error')) {?>
<div class="alert alert-danger"><?php echo Yii::$app->session->getFlash('error');?></div>
<?php }?>
</div>
	<div class="panel-heading">
		<h2 class="text-center">Database Configuration!</h2>
	</div>
	<div class="panel-body">
		<p>Below you have to enter your database connection details. If you’re not sure about these, please contact your
			administrator or web host.</p>

		<?php
			$form = \yii\widgets\ActiveForm::begin([
				                                       'id'                   => 'database-form',
				                                       'enableAjaxValidation' => FALSE,
			                                       ]);
		?>

		<hr/>

		<div class="form-group">
			<?=
				$form->field($model, 'host')->textInput([
					                                            'autofocus'    => 'on',
					                                            'autocomplete' => 'off',
					                                            'class'        => 'form-control'
				                                            ])->hint('You should be able to get this info from your web host, if localhost does not work.') ?>
		</div>

		<hr/>

		<div class="form-group">
			<?=
				$form->field($model, 'port')->textInput([
					                                            'autofocus'    => 'on',
					                                            'autocomplete' => 'off',
					                                            'class'        => 'form-control'
				                                            ])->hint('You should be able to get this info from your web host, if localhost does not work.') ?>
		</div>

		<hr/>

		<div class="form-group">
			<?=
				$form->field($model, 'username')->textInput([
					                                            'autocomplete' => 'off',
					                                            'class'        => 'form-control'
				                                            ])->hint('Your MySQL username') ?>
		</div>

		<hr/>

		<div class="form-group">
			<?=
				$form->field($model, 'password')->passwordInput([
					                                                'class' => 'form-control'
				                                                ])->hint('Your MySQL password') ?>
		</div>

		<hr/>

		<div class="form-group">
			<?=
				$form->field($model, 'db_name')->textInput([
					                                            'autocomplete' => 'off',
					                                            'class'        => 'form-control'
				                                            ])->hint('The name of the database you want to run your application in.') ?>
		</div>
		<hr/>
		<div class="form-group">
			<? /* =
				$form->field($model, 'email')->textInput([
					                                            'autocomplete' => 'off',
					                                            'class'        => 'form-control'
				                                            ])->hint('Admin email of the website. Password for admin account: admin')  */?>
		</div>

<div class="form-group">
			<?=
				$form->field($model, 'table_prefix'); ?>
		</div>
		<hr/>

		<?= \yii\helpers\Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>

		<?php \yii\widgets\ActiveForm::end(); ?>
	</div>
</div>