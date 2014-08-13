<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\cafedra\models\Cafedra */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cafedras'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cafedra-view">

    <h1><?= Html::encode('Кафедра '.$this->title) ?></h1>

    <p>
        <?php if (!\Yii::$app->user->isGuest) : 
	    ?>
	    <p>
	        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

	        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
	    </p>
	    <?php  endif;?>
	</p>

    
    <p> 
    <?php 
    	echo $model->description;
    ?>
	</p>

</div>
