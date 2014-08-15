<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;
use app\modules\cafedra\models\Cafedra;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\subject\models\SubjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Предмети');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-index">

    <h1><?= Icon::show('book', [], Icon::BSG).Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Створити {modelClass}', [
    'modelClass' => 'предмет',
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
                'attribute' => 'cafedra_id',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::a(Html::encode(Cafedra::findOne($model->cafedra_id)->title), ['/cafedra/cafedra/view', 'id' => $model->cafedra_id]);},
                'filter' => ArrayHelper::map(Cafedra::find()->all(), 'id', 'title'),
            ],          
            [
                'attribute' => 'active',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->active ? 'Активно' : 'Неактивно';},
                'filter' => ['0' => 'Неактивний', '1' => 'Активний']
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
