<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;
use app\modules\faculty\models\Faculty;
use app\components\widgets\cafedra\CafedraWidget;
/* @var $this yii\web\View */
/* @var $model app\modules\faculty\models\Faculty */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Факультети'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-10">
        <div class="faculty-view">

            <h1><?= 'Факультет '.Html::encode($this->title) ?></h1>

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
		            ],  ]) ?>
		            <?= Html::a(Icon::show('file', [], Icon::BSG).Yii::t('app', 'Створити новий'), ['create'], ['class' => 'btn btn-success']) ?>
		        </p>
		        <?php  endif;?>
		    </p>
            <p> 
            <?php 
                echo $model->description;
            ?>
            </p>
            <p> 
            <?php 
                echo 'Кількість відвідувань: '.$model->visited;
            ?>
            </p>
        </div>
    </div>
    <div class="col-md-2">
        <?= CafedraWidget::widget(['faculty_id' => $model->id]) ?>
    </div>
</div>