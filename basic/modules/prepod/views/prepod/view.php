<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\prepod\models\Prepod */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prepods'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prepod-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cafedra_id',
            'name',
            'second_name',
            'surname',
            'name_en',
            'description:ntext',
            'image_id',
            'job_id',
            'job_org_id',
            'science_status_id',
            'active',
            'visited',
        ],
    ]) ?>

</div>
