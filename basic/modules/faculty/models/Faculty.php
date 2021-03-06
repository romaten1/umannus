<?php

namespace app\modules\faculty\models;

use Yii;
use app\helpers\TransliterateHelper;

/**
 * Це клас моделі для таблиці "tbl_faculty".
 *
 * @property integer $id
 * @property string $title
 * @property string $title_en
 * @property string $description
 * @property integer $visited
 */
class Faculty extends \yii\db\ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%faculty}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['description'], 'string'],
            [['visited'], 'integer'],
            [['title', 'title_en'], 'string', 'max' => 255],
            [['image_id'], 'safe'],
            [['image_id'], 'file','extensions'=>'jpg, gif, png, bmp'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Назва'),
            'title_en' => Yii::t('app', 'Назва англійською'),
            'description' => Yii::t('app', 'Опис'),
            'visited' => Yii::t('app', 'Відвідувань'),
            'image_id' => Yii::t('app', 'Герб'),
        ];
    }
   
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->title_en =  TransliterateHelper::cyrillicToLatin($this->title);
            if ($this->isNewRecord) { // === false even we insert a new record
                $this->visited = '0';
        }
            return true;
        }
        return false;
    }
    public function getImageurl()
	{
		return '@umannus/uploads/faculty/'.$this->image_id;
	}
    public function getImageThumbsUrl()
    {
        return '@umannus/uploads/faculty/thumbs/thumb_'.$this->image_id;
    }
}
