
<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="text-center">System Check</h2>
	</div>

	<div class="panel-body">
		<p>In the following overview, you can see, if all the requirements are
			ready.</p>

		<hr />
		<p>
			Please make sure you have the database file in backup folder with
			name <strong>db_backup.sql</strong>.
		</p>
		<div class="prerequisites-list">
			<ul>
				<?php
				
foreach ( $checks as $check ) {
					?>
					<li>
						<?php
					
if ($check ['state'] == 'OK') {
						?>
							<i class="fa fa-check-circle check-ok animated bounceIn"></i>
						<?php
					} elseif ($check ['state'] == 'WARNING') {
						?>
							<i
					class="fa fa-exclamation-triangle check-warning animated swing"></i>
						<?php
					} elseif ($check ['state'] == 'ERROR') {
						?>
							<i class="fa fa-minus-circle check-error animated wobble"></i>
						<?php
					}
					?>

						<strong><?= $check['title']; ?></strong>

						<?php if (isset($check['hint'])) { ?>
							<span>(Hint: <?= $check['hint']; ?>)</span>
						<?php } ?>
					</li>
				<?php
				}
				?>
			</ul>
		</div>

		<?php
		
if (! $hasError) {
			?>
			<div class="alert alert-success">Congratulations! Everything is ok
			and ready to start over!</div>
		<?php
		}
		?>
		<hr />

		<?= \yii\helpers\Html::a('<i class="fa fa-repeat"></i> ' . 'Check again', ['//install/default/go'], ['class' => 'btn btn-info'])?>

		<?php if (!$hasError) { ?>
			<?= \yii\helpers\Html::a('Next' . ' <i class="fa fa-arrow-circle-right"></i>', ['//install/default/step2'], ['class' => 'btn btn-primary'])?>
		<?php } ?>
	</div>
</div>