<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;
/* @var $this yii\web\View */
/* @var $model app\modules\files\models\FileType */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Типи файлів'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-type-view">

    <h1><?= Html::encode($this->title) ?><small> :: Тип файлів</small></h1>

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
</div>
