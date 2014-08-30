<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use kartik\icons\Icon;
use app\modules\faculty\models\Faculty;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\cafedra\models\CafedraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Кафедри');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cafedra-index">

    <h1><?= Icon::show('briefcase', [], Icon::BSG).Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>


    <p>
        <?php if (!\Yii::$app->user->isGuest) : 
        ?>
        <p>
            <?= Html::a(Icon::show('file', [], Icon::BSG).Yii::t('app', 'Створити нову {modelClass}', [
                'modelClass' => 'кафедру',
            ]), ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a(Icon::show('cog', [], Icon::BSG).Yii::t('app', 'Редагувати {modelClass}', [
                'modelClass' => 'кафедри',
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
            $result = '<p>'. ($model->image_id ? Html::img($model->ImageThumbsUrl) : Yii::$app->params['defaults']['image']['cafedra']);
            $result .= Html::a(Html::encode('Кафедра '.$model->title), ['view', 'id' => $model->id]);
            $result .= ' :: '.Html::a(Html::encode(Faculty::findOne($model->faculty_id)->title.' факультет'), ['view', 'id' => $model->faculty_id]).'</p>';
            return $result;
            
        },
    ]) ?>
</div>


