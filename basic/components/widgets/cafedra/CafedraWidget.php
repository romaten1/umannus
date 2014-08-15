<?php 
namespace app\components\widgets\cafedra;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use app\modules\cafedra\models\Cafedra;

class CafedraWidget extends Widget
{
    public $title;

    public $faculty_id;

    public function init()
    {
        parent::init();
        if ($this->title === null) {
            $this->title = Yii::t('app', 'Кафедри факультету');
        }
    }

    public function run()
    {
        $models = Cafedra::find()->where(['faculty_id' => $this->faculty_id])->all();
        //PostsAsset::register($view);
        
        // Рендерим представление
        echo $this->render('index', [
            'models' => $models,
            'title' => $this->title
        ]);
    }
}