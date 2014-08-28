<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use app\modules\files\models\FileType;
use kartik\icons\Icon;
use yii\helpers\ArrayHelper;
use app\helpers\FileHelper;
use app\modules\subject\models\Subject;
use dektrium\user\models\User;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\files\models\FilesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Файли');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="files-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Створити {modelClass}', [
    'modelClass' => 'файли',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <? echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
            [
		        'class' => '\kartik\grid\CheckboxColumn'
		    ],
            [
		        'class' => '\kartik\grid\SerialColumn'
		    ],
            [
                'attribute' => 'title',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::a(Html::encode($model->title), ['view', 'id' => $model->id]);},
			],
            'description:ntext',
            [
                'attribute' => 'type',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::encode(FileType::findOne($model->type)->title);},
                'filter' => ArrayHelper::map(FileType::find()->all(), 'id', 'title'),
            ],
            [
                'attribute' => 'subject',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::a(Html::encode(Subject::findOne($model->subject)->title), ['/subject/subject/view', 'id' => $model->subject]);},
                'filter' => ArrayHelper::map(Subject::find()->all(), 'id', 'title'),
            ],
            [
                'attribute' => 'author_id',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::a(Html::encode(User::findOne($model->author_id)->title), ['/user/admin/' /*, 'id' => $model->id*/]);},
                'filter' => ArrayHelper::map(User::find()->all(), 'id', 'username'),
            ],
            [
                'attribute' => 'size',
                'format' => 'html',
                'value' => function ($model) {
                    return FileHelper::Size2Str($model->size);},
            ],
            [
		        'attribute' => 'status',
		        'class' => '\kartik\grid\BooleanColumn',
		        'trueLabel' => 'Активно', 
		        'falseLabel' => 'Неактивно',
		        'falseIcon' => '<span class="glyphicon glyphicon-remove text-danger">',
		    ],
            // 'title_arkhive',
            // 'content:ntext',
            // 'path',
            // 'url:url',
            // 'created_at',
            // 'updated_at',
            [
		        'class' => '\kartik\grid\ActionColumn',
		        //'dropdown' => 'true',
		        'deleteOptions' => ['label' => '<i class="glyphicon glyphicon-remove text-danger"></i>']
		    ]
            //['class' => 'yii\grid\ActionColumn'],
        ],
    'pjax' => true, // pjax is set to always true for this demo
    'bordered' => true,
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
    'hover' => true,
]);




     ?>

</div>
