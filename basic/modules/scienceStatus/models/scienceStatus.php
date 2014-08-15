<?php

namespace app\modules\scienceStatus\models;

use Yii;
use app\helpers\TransliterateHelper;
/**
 * Це клас моделі для таблиці "tbl_science_status".
 *
 * @property integer $id
 * @property string $title
 * @property string $title_en
 */
class ScienceStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%science_status}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title', 'title_en'], 'string', 'max' => 255]
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
        ];
    }
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->title_en =  TransliterateHelper::cyrillicToLatin($this->title);
            return true;
        }
        return false;
    }
}
