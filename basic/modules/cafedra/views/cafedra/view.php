<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\faculty\models\Faculty;
use app\modules\comments\widgets\comments\Comments;
use kartik\icons\Icon;
use app\components\widgets\prepods\PrepodsWidget;
/* @var $this yii\web\View */
/* @var $model app\modules\cafedra\models\Cafedra */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Кафедри'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-8">
        <div class="cafedra-view">
            <h1><?= Html::encode('Кафедра '.$this->title) ?></h1>
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
                echo 'Факультет: '.Html::a(Faculty::findOne($model->faculty_id)->title, ['/faculty/faculty/view', 'id' => $model->faculty_id]);
            ?>
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
    <div class="col-md-4"> 
        <?= PrepodsWidget::widget(['cafedra_id' => $model->id]) ?>
    </div>
    <div class="">
        <?php echo Comments::widget([
            'model' => $model,
            'maxLevel' => Yii::$app->getModule('comments')->maxLevel
        ]); ?>
    </div>
</div>


