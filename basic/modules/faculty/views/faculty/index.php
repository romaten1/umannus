<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\faculty\models\FacultySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Факультети');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faculty-index">

    <h1><?=  Icon::show('bell', [], Icon::BSG).Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php if (!\Yii::$app->user->isGuest) : 
        ?>
        <p>
            <?= Html::a(Yii::t('app', 'Створити {modelClass}', [
                'modelClass' => 'факультет',
            ]), ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a(Icon::show('cog', [], Icon::BSG).Yii::t('app', 'Редагувати {modelClass}', [
                'modelClass' => 'факультет',
            ]), ['admin'], ['class' => 'btn btn-primary']) ?>
        </p>
        <?php  endif;?>
    </p>

    
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}{pager}',
        'itemOptions' => ['class' => 'item'],
        'options' => [
            'links' => '<h2>test</h2>',
            'tag' => 'ul',
            'class' => 'ten-vertical summary-list',
        ],
        'itemView' => function ($model, $key, $index, $widget) {
            $result = '<p>'.
            	($model->image_id ? Html::img($model->Imageurl) : Yii::$app->params['defaults']['image']['faculty']) .
            	Html::a(Html::encode('Факультет '.$model->title), ['view', 'id' => $model->id]);
            return $result;
            
        },
    ]) ?>

</div>
