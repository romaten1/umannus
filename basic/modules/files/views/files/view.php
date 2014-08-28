<?php

use yii\helpers\Html;

use kartik\icons\Icon;
use app\modules\files\models\FileType;
use app\modules\subject\models\Subject;
use dektrium\user\models\User;
use yii\helpers\ArrayHelper;
use app\helpers\FileHelper;
/* @var $this yii\web\View */
/* @var $model app\modules\files\models\Files */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Files'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="files-view">

<h1><?= Html::encode($this->title).':: <small>' . Html::encode(FileType::findOne($model->type)->title). '</small>' ?></h1>

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
            echo '<h4>Коротка інформація: </h4>';
            echo Html::encode($model->description);
        ?>
    </p>
    <p> 
        <?php 
            echo '<h4>Автор: </h4>';
            echo Html::encode(User::findOne($model->author_id)->username);
        ?>
    </p>
    <p> 
        <?php 
            echo '<h4>Відноситься до предмету: </h4>';
            echo Html::encode(Subject::findOne($model->subject)->title);
        ?>
    </p>
    <p> 
        <?php 
            echo '<h4>Статус: </h4>';
            echo $model->status == 1 ? 'Активно' : 'Неактивно';
        ?>
    </p>
    <p> 
        <?php 
            echo '<h4>Розмір: </h4>';
            echo FileHelper::Size2Str($model->size);
        ?>
    </p>
    <p> 
        <?php 
            echo '<h4>Вміст: </h4>';
            echo $model->content;
        ?>
    </p>
    <p> 
        <?php 
            echo '<h4>Шлях: </h4>';
            echo $model->path;
        ?>
    </p>
    <p> 
        <?php 
            echo '<h4>Створено: </h4>';
            echo date("F j, Y, g:i a", $model->created_at);
        ?>
    </p>
    <p> 
        <?php 
            echo '<h4>Оновлено: </h4>';
            echo date("F j, Y, g:i a", $model->updated_at);
        ?>
    </p>
</div>
