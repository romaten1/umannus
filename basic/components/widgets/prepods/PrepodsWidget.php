<?php 
namespace app\components\widgets\prepods;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use app\modules\prepod\models\Prepod;

class PrepodsWidget extends Widget
{
    public $title;

    public $cafedra_id;

    public function init()
    {
        parent::init();
        if ($this->title === null) {
            $this->title = Yii::t('app', 'Викладачі кафедри');
        }
    }

    public function run()
    {
        $models = Prepod::find()->where(['cafedra_id' => $this->cafedra_id])->all();
        //PostsAsset::register($view);
        
        // Рендерим представление
        echo $this->render('index', [
            'models' => $models,
            'title' => $this->title
        ]);
    }
}