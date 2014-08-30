<?php

namespace app\modules\cafedra\models;


use Yii;

/**
 * Це клас моделі для таблиці "tbl_cafedra".
 *
 * @property integer $id
 * @property integer $faculty_id
 * @property string $title
 * @property string $title_en
 * @property string $description
 * @property integer $image_id
 * @property integer $active
 * @property integer $visited
 */
class Cafedra extends \yii\db\ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cafedra}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['faculty_id', 'title', 'description', 'active'], 'required'],
            [['faculty_id',  'active', 'visited'], 'integer'],
            [['description'], 'string'],
            [['title', 'title_en'], 'string', 'max' => 255],
            [['image_id'], 'safe'],
            [['image_id'], 'file','extensions'=>'jpg, gif, png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID кафедри'),
            'faculty_id' => Yii::t('app', 'Факультет'),
            'title' => Yii::t('app', 'Назва'),
            'title_en' => Yii::t('app', 'Назва англійською'),
            'description' => Yii::t('app', 'Коротка інформація'),
            'image_id' => Yii::t('app', 'Герб'),
            'active' => Yii::t('app', 'Активна'),
            'visited' => Yii::t('app', 'Відвідувань'),
        ];
    }
    /*public function beforeSave($insert)
    // исполняется в контроллере
    {
        if (parent::beforeSave($insert)) {
            $this->title_en =  TransliterateHelper::cyrillicToLatin($this->title);
            return true;
        }
        return false;
    }*/
    
    public function getImageurl()
	{
		return '@umannus/uploads/cafedra/'.$this->image_id;
	}
	public function getImageThumbsUrl()
	{
		return '@umannus/uploads/cafedra/thumbs/thumb_'.$this->image_id;
	}
}
