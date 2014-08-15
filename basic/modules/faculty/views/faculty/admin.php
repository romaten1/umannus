<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;
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
        <?= Html::a(Yii::t('app', 'Створити {modelClass}', [
    'modelClass' => 'факультет',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'title',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::a(Html::encode($model->title), ['view', 'id' => $model->id]);}
            ],
            [
                'attribute' => 'description',
                'format' => 'html',
                'value' => function ($model) {
                    return substr($model->description,0,1000).'...';},
            ],
            'visited',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
