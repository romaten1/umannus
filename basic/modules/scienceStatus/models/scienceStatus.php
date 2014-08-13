<?php

namespace app\modules\scienceStatus\models;

use Yii;

/**
 * Це клас моделі для таблиці "tbl_science_status".
 *
 * @property integer $id
 * @property string $title
 * @property string $title_en
 */
class scienceStatus extends \yii\db\ActiveRecord
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
            [['title', 'title_en'], 'required'],
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
            'title' => Yii::t('app', 'Title'),
            'title_en' => Yii::t('app', 'Title En'),
        ];
    }
}
