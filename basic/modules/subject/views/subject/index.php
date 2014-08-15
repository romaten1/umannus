<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;
use app\modules\cafedra\models\Cafedra;
use yii\widgets\ListView;
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
        <?php if (!\Yii::$app->user->isGuest) : 
        ?>
        <p>
            <?= Html::a(Icon::show('file', [], Icon::BSG).Yii::t('app', 'Створити новий {modelClass}', [
                'modelClass' => 'предмет',
            ]), ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a(Icon::show('cog', [], Icon::BSG).Yii::t('app', 'Редагувати {modelClass}', [
                'modelClass' => 'предмет',
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
            $result = '<p>'.Html::a(Html::encode($model->title), ['view', 'id' => $model->id]);
            $result .= ' :: Кафедра '.Html::a(Html::encode(Cafedra::findOne($model->cafedra_id)->title), ['/cafedra/cafedra/view', 'id' => $model->cafedra_id]).'</p>';
            return $result;
            
        },
    ]) ?>

</div>
