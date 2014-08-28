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
use yii\widgets\ListView;
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
        <?php if (!\Yii::$app->user->isGuest) : 
        ?>
        <p>
            <?= Html::a(Icon::show('file', [], Icon::BSG).Yii::t('app', 'Створити {modelClass}', [
                'modelClass' => 'файли',
            ]), ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a(Icon::show('cog', [], Icon::BSG).Yii::t('app', 'Редагувати {modelClass}', [
                'modelClass' => 'файли',
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
            $result .= ' :: '. Html::encode(FileType::findOne($model->type)->title) .'</p>';
            return $result;
            
        },
    ]) ?>
    

</div>
