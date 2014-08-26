<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\cafedra\models\Cafedra;
use kartik\icons\Icon;
/* @var $this yii\web\View */
/* @var $model app\modules\subject\models\Subject */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Предмети'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (!\Yii::$app->user->isGuest) : 
        ?>
        <p>
            <?= Html::a(Icon::show('repeat', [], Icon::BSG).Yii::t('app', 'Оновити'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

            <?= Html::a(Icon::show('remove', [], Icon::BSG).Yii::t('app', 'Видалити'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Ви впевнені, що хочете видалити цей запис?'),
                'method' => 'post',
            ],  ]) ?>
            <?= Html::a(Icon::show('file', [], Icon::BSG).Yii::t('app', 'Створити новий'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php  endif;?>
    </p>

    <p> 
    <?php 
        echo 'Кафедра: '.Html::a(Cafedra::findOne($model->cafedra_id)->title, ['/cafedra/cafedra/view', 'id' => $model->cafedra_id]);
    ?>
    </p>
</div>
