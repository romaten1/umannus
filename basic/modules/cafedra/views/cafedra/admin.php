<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\faculty\models\Faculty;
use kartik\icons\Icon;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\cafedra\models\CafedraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Кафедри');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cafedra-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Icon::show('file', [], Icon::BSG).Yii::t('app', 'Створити {modelClass}', [
    'modelClass' => 'кафедру',
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
                'attribute' => 'faculty_id',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::a(Html::encode(Faculty::findOne($model->faculty_id)->title), ['view', 'id' => $model->faculty_id]);},
                'filter' => ArrayHelper::map(Faculty::find()->all(), 'id', 'title'),
            ],
            //'description:ntext',
            [
                'attribute' => 'description',
                'format' => 'html',
                'value' => function ($model) {
                    return substr($model->description,0,1000).'...';},
            ],
            // 'image_id',
            [
                'attribute' => 'active',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->active == '1' ? 'Активна' : 'Неактивна';},
                'filter' => ['0' => 'Неактивна', '1' => 'Активна']
            ],
            // 'visited',
            ['class' => 'yii\grid\ActionColumn'],


        ],
    ]); ?>

</div>
