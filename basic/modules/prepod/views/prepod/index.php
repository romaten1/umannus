<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\prepod\models\PrepodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Prepods');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prepod-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Prepod',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cafedra_id',
            'name',
            'second_name',
            'surname',
            // 'name_en',
            // 'description:ntext',
            // 'image_id',
            // 'job_id',
            // 'job_org_id',
            // 'science_status_id',
            // 'active',
            // 'visited',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
