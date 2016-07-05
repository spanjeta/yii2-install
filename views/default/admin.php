<?php
/* @var $this SiteController */
/* @var $model LoginForm */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\UrlRule;
use yii\helpers\Url;

?>
<?php if(Yii::$app->session->hasFlash('success')){?>
			<div class="alert alert-success">
			<?php echo Yii::$app->session->getFlash('success'); ?>
			</div>
			<?php }?>
<div id="create-admin-account-form" class="panel panel-default">
	<div class="panel-heading">
		<h2 class="text-center">Admin Account</h2>
	</div>

	<div class="panel-body">
		<p>You're almost done. In the last step you have to fill out the form to create an admin account. With this
			account you can manage the whole website.</p>
		<hr/>
		<?php $form = \yii\widgets\ActiveForm::begin([
			                                             'id'                   => 'admin-form',
				
		                                             ]); ?>
		<div class="form-group">
			<?= $form->field($model, 'full_name')->textInput([
				                                                'class'        => 'form-control',
				                                                'autofocus'    => 'on',
				                                                'autocomplete' => 'off'
			                                                ]) ?>
		</div>

		<div class="form-group">
			<?= $form->field($model, 'email')->textInput([
				                                             'class'        => 'form-control',
				                                             'autocomplete' => 'off'
			                                             ]) ?>
		</div>

		<div class="form-group">
			<?= $form->field($model, 'password')->passwordInput(['class' => 'form-control']) ?>
		</div>

		<div class="form-group">
			<?= $form->field($model, 'confirmPassword')->passwordInput([
				                                                            'class'        => 'form-control',
				                                                            'autocomplete' => 'off'
			                                                            ]) ?>
		</div>

		<hr>

		<?= \yii\helpers\Html::submitButton('Create Admin Account', ['class' => 'btn btn-primary']) ?>

		<?php $form::end(); ?>

	</div>
</div>