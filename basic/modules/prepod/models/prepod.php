<?php

namespace app\modules\prepod\models;

use Yii;
use app\helpers\TransliterateHelper;
use app\modules\faculty\models\Faculty;
use app\modules\cafedra\models\Cafedra;
/**
 * Це клас моделі для таблиці "tbl_prepod".
 *
 * @property integer $id
 * @property integer $cafedra_id
 * @property string $name
 * @property string $second_name
 * @property string $surname
 * @property string $name_en
 * @property string $description
 * @property string $image
 * @property integer $job_id
 * @property integer $job_org_id
 * @property integer $science_status_id
 * @property integer $active
 * @property integer $visited
 */
class prepod extends \yii\db\ActiveRecord
{
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%prepod}}';
    }

    public function getFaculty()
    {
        return Cafedra::findOne($this->cafedra_id)->faculty_id;
    }
    public function getFullName() {
	    return $this->surname . ' ' .$this->name . ' ' . $this->second_name;
	}
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cafedra_id', 'name', 'second_name', 'surname', 'description', 'image_id', 'job_id', 'job_org_id', 'science_status_id'], 'required'],
            [['cafedra_id', 'job_id', 'job_org_id', 'science_status_id', 'active', 'visited'], 'integer'],
            [['description'], 'string'],
            [['name', 'second_name', 'surname', 'name_en'], 'string', 'max' => 100],
            [['image_id'], 'safe'],
            [['image_id'], 'file','extensions'=>'jpg, gif, png, bmp', 'maxFiles' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cafedra_id' => Yii::t('app', 'Кафедра'),
            'name' => Yii::t('app', 'Ім\'я'),
            'second_name' => Yii::t('app', 'По-батькові'),
            'surname' => Yii::t('app', 'Прізвище'),
            'name_en' => Yii::t('app', 'Ім\'я англійською'),
            'description' => Yii::t('app', 'Інформація'),
            'image_id' => Yii::t('app', 'Малюнок'),
            'job_id' => Yii::t('app', 'Посада'),
            'job_org_id' => Yii::t('app', 'Організаційна посада'),
            'science_status_id' => Yii::t('app', 'Науковий ступінь'),
            'active' => Yii::t('app', 'Активний'),
            'visited' => Yii::t('app', 'Відвідувань'),
            'faculty' => Yii::t('app', 'Факультет'),
            'fullName' => Yii::t('app', 'Повне ім\'я'),
        ];
    }
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->name_en =  TransliterateHelper::cyrillicToLatin($this->surname.$this->name);
            return true;
        }
        return false;
    }
}
