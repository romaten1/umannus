<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;
/* @var $this yii\web\View */
/* @var $model app\modules\job\models\Job */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Посади'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?php if (!\Yii::$app->user->isGuest) : 
		?>
		<p>
			<?= Html::a(Icon::show('repeat', [], Icon::BSG).Yii::t('app', 'Оновити'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

			<?= Html::a(Icon::show('remove', [], Icon::BSG).Yii::t('app', 'Видалити'), ['delete', 'id' => $model->id], [
				'class' => 'btn btn-danger',
				'data' => [
				'confirm' => Yii::t('app', 'Ви впевнені, що хочете видалити цей запис?'),
				'method' => 'post',
				],
				]) ?>
			</p>
		<?php  endif;?>
	</p>

	<p> 
            <?php 
                echo 'Тип посади: '.($model->type == '0' ? 'Посада навчальна' : 'Посада організаційна');
            ?>
    </p>

	</div>
