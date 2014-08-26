<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;
/* @var $this yii\web\View */
/* @var $model app\modules\files\models\Files */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Files'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="files-view">

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            'type',
            'title_arkhive',
            'content:ntext',
            'path',
            'subject',
            'author_id',
            'status',
            'size',
            'url:url',
            'created_at',
            'updated_at',
        ],
    ]) ?>
     <?= $size; ?>

</div>
