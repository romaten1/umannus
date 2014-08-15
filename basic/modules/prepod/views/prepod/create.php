<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\prepod\models\Prepod */

$this->title = Yii::t('app', 'Створити {modelClass}', [
    'modelClass' => 'викладача',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Викладачі'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prepod-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
