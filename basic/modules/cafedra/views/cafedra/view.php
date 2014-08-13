<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\faculty\models\Faculty;
/* @var $this yii\web\View */
/* @var $model app\modules\cafedra\models\Cafedra */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Кафедри'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cafedra-view">

    <h1><?= Html::encode('Кафедра '.$this->title) ?></h1>

    <p>
        <?php if (!\Yii::$app->user->isGuest) : 
	    ?>
	    <p>
	        <?= Html::a(Yii::t('app', 'Оновити'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

	        <?= Html::a(Yii::t('app', 'Видалити'), ['delete', 'id' => $model->id], [
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
        echo 'Факультет: '.Faculty::findOne($model->faculty_id)->title;
    ?>
    </p>
    <p> 
    <?php 
    	echo $model->description;
    ?>
	</p>

</div>
