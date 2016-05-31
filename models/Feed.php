<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feeds".
 *
 * @property integer $id
 * @property string $url
 * @property string $type
 * @property string $last_item
 */
class Feed extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feeds';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'type'], 'required'],
            [['url', 'type', 'last_item'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'type' => 'Type',
            'last_item' => 'Last Item',
        ];
    }
}
