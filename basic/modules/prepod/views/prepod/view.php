<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\faculty\models\Faculty;
use app\modules\cafedra\models\Cafedra;
use app\modules\job\models\Job;
use app\modules\scienceStatus\models\ScienceStatus;
use kartik\icons\Icon;
/* @var $this yii\web\View */
/* @var $model app\modules\prepod\models\Prepod */

$this->title = $model->surname.' '.$model->name.' '.$model->second_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Викладачі'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prepod-view">

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
            ],
        ]) ?>
	    </p>
	    <?php  endif;?>
	</p>
	<p> 
    <?php 
        $faculty_id = Cafedra::findOne($model->cafedra_id)->faculty_id;
        $faculty = Faculty::findOne($faculty_id)->title;
        echo 'Факультет: '.Html::a($faculty, ['/faculty/faculty/view', 'id' => $faculty_id]);
    ?>
    </p>
    <p> 
    <?php 
        echo 'Кафедра: '.Html::a(Cafedra::findOne($model->cafedra_id)->title, ['/cafedra/cafedra/view', 'id' => $model->cafedra_id]);
    ?>
    </p>
    <p> 
    <?php 
        echo 'Посада: '.Job::findOne($model->job_id)->title;
    ?>
    </p>
    <p> 
    <?php 
        if(!empty($model->job_org_id)){
        	echo 'Організаційна посада: '.Job::findOne($model->job_org_id)->title;
        }       
    ?>
    </p>
    <p> 
    <?php 
        if(!empty($model->job_org_id)){
        	echo 'Науковий ступінь: '.ScienceStatus::findOne($model->science_status_id)->title;
        }     
    ?>
    </p>
    <p> 
    <?php 
    	echo '<h4>Коротка інформація: </h4>';
    	echo $model->description;
    ?>
	</p>
    <p> 
    <?php 
        echo 'Кількість відвідувань: '.$model->visited;
    ?>
    </p>
</div>
