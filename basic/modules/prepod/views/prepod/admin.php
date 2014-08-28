<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;
use app\modules\job\models\Job;
use app\modules\scienceStatus\models\ScienceStatus;
use app\modules\faculty\models\Faculty;
use app\modules\cafedra\models\Cafedra;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\prepod\models\PrepodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Викладачі');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prepod-index">

    <h1><?= Icon::show('user', [], Icon::BSG).Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Icon::show('file', [], Icon::BSG).Yii::t('app', 'Створити {modelClass}', [
    'modelClass' => 'викладача',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'surname',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::a(Html::encode($model->surname.' '.$model->name.' '.$model->second_name), ['view', 'id' => $model->id]);}
            ],
            [
                'attribute' => 'image_id',
                'format' => 'image',
                'value' => function ($model) {
                    return $model->Imageurl;}
            ],
            [
                'attribute' => 'cafedra_id',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::a(Html::encode(Cafedra::findOne($model->cafedra_id)->title), ['/cafedra/cafedra/view', 'id' => $model->cafedra_id]);},
                'filter' => ArrayHelper::map(Cafedra::find()->all(), 'id', 'title'),
            ],
            [
                'attribute' => 'faculty',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::a(Html::encode(Faculty::findOne($model->faculty)->title), ['/faculty/faculty/view', 'id' => $model->faculty]);},
            	//'filter' => ArrayHelper::map(Faculty::find()->all(), 'id', 'title'),
            ],
            [
                'attribute' => 'job_id',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::encode(Job::findOne($model->job_id)->title);},
                'filter' => ArrayHelper::map(Job::find()->where(['type' => Job::STATUS_JOB_WORK])->all(), 'id', 'title'),
            ],
            [
                'attribute' => 'job_org_id',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::encode(Job::findOne($model->job_org_id)->title);},
                'filter' => ArrayHelper::map(Job::find()->where(['type' => Job::STATUS_JOB_ORG])->all(), 'id', 'title'),
            ],
            [
                'attribute' => 'science_status_id',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::encode(ScienceStatus::findOne($model->science_status_id)->title);},
                'filter' => ArrayHelper::map(ScienceStatus::find()->all(), 'id', 'title'),
            ],
            [
                'attribute' => 'active',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->active == '1' ? 'Активна' : 'Неактивна';},
                'filter' => ['0' => 'Неактивна', '1' => 'Активна']
            ],
            'visited',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <p>
        <?= Html::a(Yii::t('app', 'Скинути фільтр'), ['admin'], ['class' => 'btn btn-primary']); ?>
    </p>

</div>
