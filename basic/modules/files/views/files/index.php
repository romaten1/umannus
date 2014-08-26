<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
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

    <? /* GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'description:ntext',
            'type',
            'title_arkhive',
            // 'content:ntext',
            // 'path',
            // 'subject',
            // 'author_id',
            // 'status',
            // 'size',
            // 'url:url',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);*/

    echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'description:ntext',
            'type',
            'title_arkhive',
            // 'content:ntext',
            // 'path',
            // 'subject',
            // 'author_id',
            // 'status',
            // 'size',
            // 'url:url',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
    'pjax' => true, // pjax is set to always true for this demo
    'beforeHeader'=>[
        [
            'columns'=>[
                ['content'=>'Header Before 1', 'options'=>['colspan'=>4, 'class'=>'text-center warning']], 
                ['content'=>'Header Before 2', 'options'=>['colspan'=>4, 'class'=>'text-center warning']], 
                ['content'=>'Header Before 3', 'options'=>['colspan'=>3, 'class'=>'text-center warning']], 
            ],
            'options'=>['class'=>'skip-export'] // remove this row from export
        ]
    ],
    'toolbar' =>  Html::button('<i class="glyphicon glyphicon-plus"> ' . 
        Yii::t('app', 'Add Book'), ['type'=>'button', 'class'=>'btn btn-success']) . ' ' .
        Html::a('<i class="glyphicon glyphicon-repeat"> ' . 
        Yii::t('app', 'Reset Grid'), ['grid-demo'], ['data-pjax'=>false, 'class' => 'btn btn-info']),
        
    // parameters from the demo form
    'bordered' => true,
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
    'hover' => true,
    //'floatHeader' => true,
    //'floatHeaderOptions' => ['scrollingTop' => $scrollingTop],
    'showPageSummary' => true,
    'panel' => true,
    //'exportConfig' => $exportConfig,
]);




     ?>

</div>
