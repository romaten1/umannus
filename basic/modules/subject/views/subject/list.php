<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use kartik\icons\Icon;
use app\models\User;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\cafedra\models\CafedraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Предмети');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cafedra-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php if (!\Yii::$app->user->isGuest) : 
    ?>
    <p>
        <?= Html::a(Icon::show('file', [], Icon::BSG).Yii::t('app', 'Створити новий {modelClass}', [
            'modelClass' => 'предмет',
        ]), ['create'], ['class' => 'btn btn-success']) ?>

        <?= Html::a(Icon::show('cog', [], Icon::BSG).Yii::t('app', 'Управління {modelClass}', [
            'modelClass' => 'предметами',
        ]), ['index'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?php  endif;?>
    

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'pager'        => [

                'firstPageLabel'    => Icon::show('FAST_BACKWARD', [], Icon::BSG),
                                        
                //'lastPageLabel'     => Glyph::icon(Glyph::ICON_FAST_FORWARD),

                //'nextPageLabel'     => Glyph::icon(Glyph::ICON_STEP_FORWARD),

                //'prevPageLabel'     => Glyph::icon(Glyph::ICON_STEP_BACKWARD),

            ],
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode('Предмет: '.$model->title), ['view', 'id' => $model->id]);
        },
    ]) ?>

</div>
